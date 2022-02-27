<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
    <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
      <img class="w-16 h-16 rounded-full" :src="avatar" alt="User Photo">
    </button>
    
    <h2 class="mt-8 font-semibold text-indigo-500 dark:text-indigo-400">Posts</h2>
    
    <p class="mt-4 text-3xl sm:text-4xl text-slate-900 font-extrabold tracking-tight dark:text-slate-50">Sollicitudin tempor id eu nisl nunc mi ipsum.</p>
    
    <div class="mt-4 max-w-3xl space-y-6">
      <p>Tailwind is unapologetically modern, and takes advantage of all the latest and greatest CSS features to make the developer experience as enjoyable as possible.</p>
      
      <p>We've got first-class CSS grid support, composable transforms and gradients powered by CSS variables, support for modern state selectors like<code class="font-mono text-slate-900 font-medium dark:text-slate-200">:focus-visible</code>, and tons more.</p>

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa id neque aliquam vestibulum morbi blandit cursus risus at. Pulvinar sapien et ligula ullamcorper malesuada proin.</p>
      
      <p>Dignissim sodales ut eu sem integer vitae justo. Eu facilisis sed odio morbi. Ac felis donec et odio pellentesque diam volutpat.</p>
      
      <p>Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Amet mauris commodo quis imperdiet massa. Consequat nisl vel pretium lectus quam id leo in. Sapien faucibus et molestie ac feugiat sed lectus.</p>
    </div>
    
    <router-link to="/posts" class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-indigo-50 text-indigo-600 hover:bg-indigo-200 hover:text-indigo-700 focus:ring-indigo-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-8">
      Open<span class="sr-only">, grid template columns</span>
      
      <svg class="overflow-visible ml-3 text-indigo-300 group-hover:text-indigo-400 dark:text-slate-500 dark:group-hover:text-slate-400" width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M0 0L3 3L0 6"></path>
      </svg>
    </router-link>
  </div>
</template>

<script>
export default {
  name: "Home",
  props: {
    avatar: {
      type: String,
      required: false,
      default: "https://avatars.githubusercontent.com/u/49111142?v=4"
    }
  }
};
</script>

<style scoped></style>