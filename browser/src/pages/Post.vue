<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <Header :data="ui.header.attributes" :length="ui.header.length"></Header>
        </thead>
        <tbody v-for="(post, key) in http.posts" :key="key" class="bg-white divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                  <img class="h-10 w-10 rounded-full" :src="post.user.avatar" alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">{{ post.user.name }}</div>
                  <div class="text-sm text-gray-500">{{ post.user.email }}</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">{{  post.name }}</div>
              <div class="text-sm text-gray-500">{{ post.text }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> {{ post.created_at }} </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ post.comments.length }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">Open</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</template>

<script>
import post from "../http/post.js";

import Header from '../components/Header.vue';

export default {
  name: "Post",
  components: {
    Header
  },
  data() {
    return {
      http: {
        posts: [],
      },
      ui: {
        header: {
          attributes: [
            'Author',
            'Title',
            'Date',
            'Comments'
          ],
          length: 5
        }
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

<style></style>