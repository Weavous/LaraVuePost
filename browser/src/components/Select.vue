<template>
  <div class="w-full max-w-xs mx-auto" v-if="this.items.length > 0">
      <label id="listbox-label" class="block text-sm font-medium text-gray-700">Assigned to</label>
      <div class="mt-1 relative">
        <button @click="togglePopup" type="button" class=" relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" x-ref="button" aria-haspopup="listbox" :aria-expanded="open">
          <span class="flex items-center">
            <img :src="active.avatar" alt="Avatar" class="flex-shrink-0 h-6 w-6 rounded-full">
            <span class="ml-3 block truncate">{{ active.name }}</span>
          </span>
          <span class=" ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/selector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </span>
        </button>

        <ul v-show="isOpen" class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm" x-max="1" x-ref="listbox" tabindex="-1" role="listbox">
          <li v-for="(item, key) in items" :key="key" class=" cursor-default select-none relative py-2 pl-3 pr-9 hover:bg-pink-50" id="listbox-option-0" role="option" @click="choose(item.id)">
            <div class="flex items-center">
              <img :src="item.avatar" alt="Avatar" class="flex-shrink-0 h-6 w-6 rounded-full">
              <span x-state:on="Selected" x-state:off="Not Selected" class="ml-3 block truncate font-normal">{{ item.name }}</span>
            </div>

            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" v-if="item.id === active.id">
              <svg class="h-5 w-5" x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
            </span>
          </li>
        </ul>
      </div>
  </div>
</template>

<script>

import user from "../http/user";

export default {
  name: "Select",
  data() {
    return {
      activeIndex: 0,
      isOpen: false,
      open: true,
      active: { },
      items: [{ }],
    };
  },
  methods: {
    choose(id) {
        this.active = this.items.find(el => el.id === id);

        this.isOpen = false;

        this.$emit('choose', this.active);
    },
    togglePopup() {
      if (this.isOpen) {
      this.isOpen = false;
      } else {
      this.isOpen = true;
      }
    }
  },
  created() {
      user.index().then(response => {
        this.items = response.data;

        this.active = this.items.find(n => n);
      })
  }
};
</script>

<style>
.top-100 {
  top: 100%;
}
.bottom-100 {
  bottom: 100%;
}
.max-h-select {
  max-height: 300px;
}
</style>