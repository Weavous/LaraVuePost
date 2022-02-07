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

    <div class="w-2/3 bg-gray p-2 pt-4 rounded shadow-lg mb-16" v-for="(reply, key) in replies" :key="key">
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
    </div>

    <div class="w-2/3 bg-white p-2 pt-4 rounded shadow-lg">
      <div class="flex ml-3 mb-8">
        <div class="mr-3">
          <img :src="replier.avatar" alt="Avatar" class="rounded-full h-16">
        </div>
        <div>
          <h1 class="font-semibold">{{ replier.name }}</h1>
          <p class="text-xs text-gray-500">{{ new Date(replier.created_at).toGMTString() }}</p>
        </div>
        <Select @choose="choose"></Select>
      </div>

      <div class="mt-3 p-3 w-full">
        <textarea rows="3" class="border p-2 rounded w-full" placeholder="Write something..." v-model="reply.text"></textarea>
      </div>

      <div class="flex justify-between mx-3">
        <div>
          <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-12 rounded inline-flex items-center" @click="replyTo()">
            <span>Submit</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import comment from "../http/comment.js";
import reply from "../http/reply.js";

import Select from '../components/Select.vue';

export default {
  name: "Reply",
  data() {
    return {
      comment: {
        user: {}
      },
      replier: {},
      replies: [],
      reply: {
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
  methods: {
    replyTo() {
      if (typeof this.replier.id === typeof undefined) {
        alert("Please, choose an user!");

        return false;
      }

      if (typeof this.reply.text.length === 0) {
        alert("The reply content cannot be empty!");

        return false;
      }

      comment.store({
        comment_id: this.reply.comment_id,
        text: this.reply.text,
        user_id : this.replier.id
      }).then((response) => {
        this.replies.push({
          created_at: response.data.created_at,
          text: response.data.text,
          user: this.replier
        });
      });
    },
    choose(user) {
      this.replier = user;
    }
  }
};
</script>

<style></style>