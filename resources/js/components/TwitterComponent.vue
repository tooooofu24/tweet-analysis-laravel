<script setup>
</script>
<template>
  <div>
    <TwitterFormComponent
      :username="username"
      :searchWords="searchWords"
    ></TwitterFormComponent>
    <TwitterResultComponent></TwitterResultComponent>
  </div>
</template>
<script>
import TwitterFormComponent from "./TwitterFormComponent.vue";
import TwitterResultComponent from "./TwitterResultComponent.vue";
export default {
  data() {
    return {
      username: "mcgardman",
      searchWords: ["…", "。。", "、、", "・・", "明日"],
    };
  },
  methods: {},
  components: {
    TwitterFormComponent,
    TwitterResultComponent,
  },
};
</script>
