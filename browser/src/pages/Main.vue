<template>
  <div class="relative h-screen flex flex-col justify-between">
    <Nav></Nav>
    <router-view></router-view>
    <Footer></Footer>
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import Nav from "../components/Nav.vue";

export default {
  name: "Main",
  components: {
    Footer,
    Nav
  },
};
</script>

<style scoped></style>