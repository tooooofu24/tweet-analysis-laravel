<script setup>
</script>
<template>
  <div>
    <TwitterFormComponent></TwitterFormComponent>
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
  methods: {
    analyzeByTwitter() {
      this.axios
        .get("/api/twitter/profile/" + this.username)
        .then((response) => {
          console.log(response.data);
        });
    },
  },
  components: {
    TwitterFormComponent,
    TwitterResultComponent,
  },
};
</script>
