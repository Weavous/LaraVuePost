<template>
  <div class="flex flex-col">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="flow flex justify-evenly min-w-full">
        <div v-for="(post, key) in http.posts" :key="key" class="my-4">
          <Card :name="post.user.name" :avatar="post.user.avatar" :created_at="post.user.created_at" :id="post.id" :title="post.name" :text="post.text"></Card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import post from "../http/post.js";

import Card from "../components/Card.vue";

export default {
  name: "Post",
  components: {
    Card,
  },
  data() {
    return {
      http: {
        posts: [],
      }
    };
  },
  created() {
    post.index().then((response) => {
      this.http.posts = response.data;
    });
  },
};
</script>

<style>
.flow {
  flex-flow: row wrap;
}
</style>