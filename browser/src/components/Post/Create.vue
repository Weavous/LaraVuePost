<template>
  <div>
    <div class="relative px-4 w-full min-w-full h-full md:h-auto">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="p-6">
          <Select @choose="choose"></Select>
        </div>

        <div class="p-6">
          <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
          <input type="text" id="base-input" v-model="form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="p-6 space-y-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Message</label>
          <textarea id="message" rows="4" v-model="form.text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>

        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
          <button data-modal-toggle="defaultModal" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" @click="create()">Submit</button>
          <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" @click="clear()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Select from "../Select.vue";

import post from "../../http/post.js";
import Post from "../../validations/post";

import { HTTP_CREATED } from "../../config/response";

export default {
  name: "Create",
  data() {
    return {
      form: {
        name: "",
        text: "",
        user_id: null
      }
    }
  },
  components: {
    Select
  },
  methods: {
    clear() {
      this.form = {
        name: "",
        text: "",
        user_id: null
      }
    },
    create() {
      const PostValidator = new Post(this.form.name, this.form.text, this.form.user_id);

      if (PostValidator.fails()) {
        alert(PostValidator.message());

        return false;
      }

      post.store(this.form).then((response) => {
        if (response.status === HTTP_CREATED) {  
          this.$emit("oncreate", response.data);

          this.clear();
        }
      }).catch(error => {
        //
      });

    },
    choose(user) {
      this.form.user_id = user.id;
    }
  },
};
</script>

<style scoped></style>