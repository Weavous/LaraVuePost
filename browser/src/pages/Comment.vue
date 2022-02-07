<template>
  <div class="flex flex-col p-4">
    <div class="py-2 align-middle inline-block min-w-full">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg min-w-full p-4">
        <div class="w-full text-center lg:text-left">
          <h1 class="text-3xl leading-snug text-gray-800 dark:text-gray-200 md:text-4xl">
            <span class="font-semibold">{{ http.post.name }}</span>
          </h1>

          <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">{{ http.post.text }}</p>
        </div>

        <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">Comments</p>

        <div class="items-center justify-center w-full">
          <Comment v-for="(comment, key) in http.post.comments" :key="key" :id="comment.id" :name="comment.user.name" :text="comment.text" :avatar="comment.user.avatar" :created_at="comment.created_at" :replies="replies(comment)"></Comment>
        </div>

        <div class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          <router-link to="/posts" class="text-indigo-600 hover:text-indigo-900">Back</router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import comment from "../http/post.js";

import Comment from "../components/Comment.vue";
import Header from "../components/Header.vue";

export default {
  name: "Post",
  components: {
    Comment,
    Header,
  },
  data() {
    return {
      http: {
        post: [],
      },
      ui: {
        header: {
          attributes: ["Author", "Title", "Date", "Comments"],
          length: 5,
        },
      },
    };
  },
  created() {
    comment.get(this.$route.params.id).then((response) => {
      this.http.post = response.data;
    });
  },
  methods: {
    replies(comment) {
      let count = 0;
      let current = comment.comment;

      while(true) {
        if (current === null) {
          break;
        }

        count++;
        current = current.comment;
      }

      return count;
;    }
  }
};
</script>

<style></style>