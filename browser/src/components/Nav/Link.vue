<template>
  <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
    <li v-for="(route, key) in routes" :key="key">
      <router-link :to="route.path" aria-current="page" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" v-bind:class="current() === route.path ? 'md:text-blue-700': 'md:dark:hover:text-white'">{{ route.name }}</router-link>
    </li>
  </ul>
</template>

<script>
export default {
  name: "Link",
  props: {
    routes: {
      type: new Array(),
      required: false,
      default() {
        return [
          {
            path: "/",
            name: "Home",
          },
          {
            path: "/projects",
            name: "Projects",
          },
          {
            path: "/contact",
            name: "Contact",
          },
        ];
      },
    },
  },
  methods: {
    current() {
      return this.$route.path === "/" ? this.$route.path: this.$route.matched.find((n) => n).path;
    },
  },
};
</script>

<style scoped></style>