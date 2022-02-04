<template>
  <tr>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" v-for="(name, key) in collection" :key="key">{{ name }}</th>
  </tr>
</template>

<script>
export default {
  name: "Header",
  props: {
    data: {
      type: Array,
      required: true,
    },
    length: {
      type: Number,
      required: false,
      default: 0,
    },
  },
  computed: {
    collection: (_this) => {
      if (_this.length > 0) {
        _this.data.push(...new Array(_this.length - _this.data.length));
      }

      return _this.data;
    },
  },
};
</script>

<style></style>