<template>
  <div class="flex h-screen justify-center items-center flex-col">
    <div class="w-4/5 bg-green-100 p-2 pt-4 rounded shadow-lg mb-4">
      <div class="flex ml-3">
        <div class="mr-3">
          <img :src="comment.user.avatar" alt="Avatar" class="rounded-full h-16">
        </div>
        <div>
          <h1 class="font-semibold">{{ comment.user.name }}</h1>
          <p class="text-xs text-gray-500">{{ new Date(comment.created_at).toGMTString() }}</p>
        </div>
      </div>
      <div class="text-center text-gray-400">
        {{ comment.text }}
      </div>
    </div>

    <div class="w-2/3 bg-gray p-2 pt-4 rounded shadow-lg mb-4 h-min-full p-6" v-for="(reply, key) in replies" :key="key">
      <div class="flex ml-3">
        <div class="mr-3">
          <img :src="reply.user.avatar" alt="Avatar" class="rounded-full h-16">
        </div>
        <div>
          <h1 class="font-semibold">{{ reply.user.name }}</h1>
          <p class="text-xs text-gray-500">{{ new Date(reply.created_at).toGMTString() }}</p>
        </div>
      </div>
      <div class="text-center text-gray-400">
        {{ reply.text }}
      </div>
      <div>
        <router-link :to="`/comments/${reply.id}`" class="relative bg-gray-500 text-white p-3 rounded-lg text-sm uppercase font-semibold tracking-tight overflow-visible">Reply</router-link>
      </div>
    </div>

    <div class="w-2/3 bg-white p-2 pt-4 rounded shadow-lg">
      <div class="grid grid-cols-7 gap-4 p-7">
        <div class="flex" v-if="reply.user.id > 0">
          <div class="mr-3 w-24 flex justify-center">
            <img :src="reply.user.avatar" alt="Avatar" class="rounded-full w-16 h-16">
          </div>
          <div>
            <h1 class="font-semibold">{{ reply.user.name }}</h1>
            <p class="text-xs text-gray-500">{{ new Date(reply.user.created_at).toGMTString() }}</p>
          </div>
        </div>
        <div class="col-span-6">
          <Select @choose="choose"></Select>
        </div>
      </div>

      <div class="mt-3 p-6 w-full">
        <textarea rows="3" class="border p-2 rounded w-full" placeholder="Write something..." v-model="reply.text"></textarea>
      </div>

      <div class="flex justify-between mx-3">
        <div>
          <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-12 rounded inline-flex items-center" @click="replyTo()">
            <span>Submit</span>
          </button>
        </div>
        <div v-if="comment.comment_id > 0">
          <router-link :to="`/comments/${comment.comment_id}`" class="text-indigo-600 hover:text-indigo-900">Back</router-link>
        </div>
        <div v-else>
          <router-link :to="`/posts/${comment.post_id}`" class="text-indigo-600 hover:text-indigo-900">Back</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import comment from "../../http/comment.js";
import Comment from "../../validations/comment";

import reply from "../../http/reply.js";

import Select from '../../components/Select.vue';

export default {
  name: "ShowComment",
  data() {
    return {
      comment: {
        user: {}
      },
      replies: [],
      reply: {
        user: {},
        comment_id: this.$route.params.id,
        text: ""
      }
    };
  },
  components: {
    Select
  },
  created() {
    comment.get(this.$route.params.id).then((response) => {
      this.comment = response.data;
    });

    reply.get(this.$route.params.id).then((response) => {
      this.replies = response.data;
    });
  },
  watch: {
    $route(to, from) { 
      if (to !== from) {
        location.reload();
      }
    }
  },
  methods: {
    replyTo() {     
      const CommentValidator = new Comment(this.reply.text, this.reply.user.id, null, this.reply.comment_id);

      if (CommentValidator.failsOnComment()) {
        alert("Check the form fields. One or more fields are missing or incorrect");

        return false;
      }

      comment.store({
        comment_id: this.reply.comment_id,
        text: this.reply.text,
        user_id : this.reply.user.id
      }).then((response) => {
        this.replies.unshift({
          created_at: response.data.created_at,
          id: response.data.id,
          text: response.data.text,
          user: this.reply.user
        });
      });
    },
    choose(user) {
      this.reply.user = user;
    }
  }
};
</script>

<style scoped></style>