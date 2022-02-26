<template>
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl h-40">
    <div class="grid grid-cols-3 gap-4">
      <div class="md:shrink-0 min-h-full">
        <User :name="name" :created_at="created_at" :avatar="avatar"></User>
      </div>
      <div class="p-6 col-span-2">
        <div class="grid grid-cols-3 gap-4">
          <div class="col-span-2 flex flex-col">
            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ name }}</div>
            <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ title }}</a>
          </div>
          <div class="flex justify-center items-center">
            <router-link :to="`/posts/${id}`" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Open</router-link>
          </div>
        </div>
        <p class="mt-2 text-slate-500">{{ text }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import User from "../components/User.vue";

export default {
  name: "Card",
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
      required: true
    },
    id: {
      type: Number,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    text: {
      type: String,
      required: true
    }
  },
  components: {
    User
  }
};
</script>

<style scoped></style>