<template>
  <ul class="flex flex-wrap items-center mt-3 sm:mt-0">
    <li v-for="(link, key) in links" :key="key">
      <a class="mx-4 text-sm text-gray-500 hover:underline md:mx-6 dark:text-gray-400">{{ link }}</a>
    </li>
  </ul>
</template>

<script>
export default {
  name: "Link",
  props: {
    links: {
      type: Array,
      required: false,
      default() {
        return ["About", "Privacy Policy", "Licensing", "Contact"];
      },
    },
  },
};
</script>

<style scoped></style>