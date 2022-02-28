<template>
  <div>
    <div class="relative w-full min-w-full h-full md:h-auto">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="p-6">
          <Select @choose="choose"></Select>
        </div>

        <div class="p-6 space-y-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Message</label>
          <textarea id="message" rows="4" v-model="form.text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>

        <div class="p-6 flex items-center space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
          <button data-modal-toggle="defaultModal" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" @click="create()">Submit</button>
          <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" @click="clear()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Select from "../Select.vue";

import comment from "../../http/comment.js";
import Comment from "../../validations/comment";

import { HTTP_CREATED } from "../../config/response";

export default {
  name: "Create",
  data() {
    return {
      form: {
        text: "",
        user_id: null
      }
    }
  },
  props: {
    post_id: {
      type: Number,
      required: true
    },
    comment_id: {
      type: Number,
      required: false
    }
  },
  components: {
    Select
  },
  methods: {
    clear() {
      this.form = {
        text: "",
        user_id: null
      }
    },
    create() {
      const CommentValidator = new Comment(this.form.text, this.form.user_id, this.post_id, this.comment_id);

      if (CommentValidator.failsOnPost()) {
        alert("Check the form fields. One or more fields are missing or incorrect");

        return false;
      }

      comment.store({
        text: this.form.text,
        user_id: this.form.user_id,
        post_id: this.post_id
      }).then((response) => {
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