<template>
  <div class="flex flex-col">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <Create @oncreate="oncreate"></Create>
      
      <div class="flow flex px-4 justify-between min-w-full">
        <div v-for="(post, key) in http.posts" :key="key" class="my-4">
          <Card :name="post.user.name" :avatar="post.user.avatar" :created_at="post.user.created_at" :id="post.id" :title="post.name" :text="post.text" :quantity="post.comments.length"></Card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import post from "../../http/post.js";

import Card from "../Card.vue";
import Show from "./Show.vue";
import Create from "./Create.vue";

export default {
  name: "Index",
  components: {
    Card,
    Create,
    Show
  },
  data() {
    return {
      http: {
        posts: [],
      },
      current: 0,
      display: false
    };
  },
  created() {
    post.index().then((response) => {
      this.http.posts = response.data;
    });
  },
  methods: {
    oncreate(post) {
      this.http.posts.unshift(post);
    }
  }
};
</script>

<style>
.flow {
  flex-flow: row wrap;
}
</style>