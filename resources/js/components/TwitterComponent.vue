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
      username: "",
      searchWords: ["…", "。。", "、、", "・・"],
      userData: {
        name: "",
        profile_image_url: "",
        id: "",
        protected: false,
        username: "",
      },
      tweets: [],
    };
  },
  methods: {
    analyzeByTwitter() {
      this.getTweets().then(() => {});
    },
    async getTweets() {
      await this.axios
        .get("/api/twitter/" + this.username)
        .then((response) => {
          console.log(response.data);
          this.tweets = response.data.tweets;
          this.userData = response.data.userData;
        })
        .catch(function (error) {});
    },
    // 正規表現でマッチした回数を数えるメソッド
    countReg(text, reg) {
      return (text.match(new RegExp(reg, "g")) || []).length;
    },
  },
  computed: {
    counts() {
      let counts = {};
      this.searchWords.forEach((element, index) => {
        counts[element] = 0;
      });
      this.tweets.forEach((tweet, index) => {
        this.searchWords.forEach((element, index) => {
          counts[element] += this.countReg(tweet.text, element);
        });
      });
      return counts;
    },
  },
  components: {
    TwitterFormComponent,
    TwitterResultComponent,
  },
};
</script>
