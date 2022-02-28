<template>
  <div class="flex flex-col p-4">
    <div class="py-2 align-middle inline-block min-w-full">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg min-w-full p-4">
        <div class="p-6 w-full text-center lg:text-left relative bg-white rounded-lg shadow dark:bg-gray-70">
          <h1 class="text-3xl leading-snug text-gray-800 dark:text-gray-200 md:text-4xl">
            <span class="font-semibold">{{ http.post.name }}</span>
          </h1>

          <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">{{ http.post.text }}</p>
        </div>

        <p class="p-6 text-lg text-gray-500 dark:text-gray-300">Comments</p>

        <div class="p-6 items-center justify-center w-full">
          <Comment v-for="(comment, key) in http.post.comments" :key="key" :id="comment.id" :name="comment.user.name" :text="comment.text" :avatar="comment.user.avatar" :created_at="comment.created_at"></Comment>
        </div>

        <Create :post_id="parseInt($route.params.id)" @oncreate="oncreate"></Create>

        <div class="p-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          <router-link to="/posts" class="text-indigo-600 hover:text-indigo-900">Back</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import comment from "../../http/post.js";

import Comment from "../../components/Comment.vue";
import Header from "../../components/Header.vue";

import Create from "../../components/Comment/Create.vue";

export default {
  name: "ShowPost",
  components: {
    Comment,
    Create,
    Header,
  },
  data() {
    return {
      http: {
        post: [],
      },
    };
  },
  created() {
    comment.get(this.$route.params.id).then((response) => {
      this.http.post = response.data;
    });
  },
  methods: {
    oncreate(comment) {
      this.http.post.comments.unshift(comment);
    }
  }
};
</script>

<style scoped></style>