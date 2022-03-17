<template>
  <div class="bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 min-h-full">
    <div class="flex justify-end px-1 pt-1">
      <button @click="enable()" class="sm:inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
        </svg>
      </button>

      <div class="z-10 w-full text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" v-bind:class = "(active) ? 'block' : 'hidden'">
        <ul class="py-1">
          <li>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-gray-700">Edit</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-gray-700">Export Data</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-red-600">Delete</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="flex flex-col items-center">
      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
        <img class="w-12 h-12 rounded-full" :src="avatar" alt="User Photo">
      </button>

      <h3 class="my-2 text-sm font-medium text-gray-900 dark:text-white">{{ name }}</h3>
      <span class="text-xs text-gray-500 dark:text-gray-400">{{ new Date(created_at).toGMTString() }}</span>
    </div>
  </div>
</template>

<script>
import User from "../components/User.vue";

export default {
  name: "Card",
  data() {
    return {
      active: false
    }
  },
  props: {
    name: {
      type: String,
      required: true
    },
    avatar: {
      type: String,
      required: true
    },
    created_at: {
      type: String,
      required: false
    }
  },
  components: {
    User
  },
  methods: {
    enable() {
      this.active = !this.active;
    }
  }
};
</script>

<style scoped></style>