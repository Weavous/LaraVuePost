<template>
  <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 w-screen left-0 bottom-0">
    <TradeMark></TradeMark>

    <Link></Link>
  </footer>
</template>

<script>
import Link from "../components/Footer/Link.vue";
import TradeMark from "../components/TradeMark.vue";

export default {
  name: "Footer",
  components: {
    Link,
    TradeMark,
  },
};
</script>

<style scoped></style>