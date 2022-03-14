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
      userData: {
        name: "a",
        profile_image_url: "",
        id: "",
      },
      tweets: [],
    };
  },
  methods: {
    analyzeByTwitter() {
      this.getId().then(() => {
        console.log(this.userData);
        this.getTweets().then(() => {
          console.log(this.tweets);
        });
      });
    },
    async getId() {
      await this.axios
        .get("/api/twitter/profile/" + this.username)
        .then((response) => {
          this.userData = response.data;
        });
    },
    async getTweets() {
      await this.axios
        .get("/api/twitter/tweets/" + this.userData.id)
        .then((response) => {
          this.tweets = response.data;
        });
    },
  },
  components: {
    TwitterFormComponent,
    TwitterResultComponent,
  },
};
</script>
