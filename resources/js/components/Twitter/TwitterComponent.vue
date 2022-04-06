<template>
  <div>
    <TwitterFormComponent></TwitterFormComponent>
    <TwitterResultComponent v-if="showResult"></TwitterResultComponent>
  </div>
</template>
<script>
import TwitterFormComponent from "../Twitter/TwitterFormComponent.vue";
import TwitterResultComponent from "./result/TwitterResultComponent.vue";
import dateFormat, { masks } from "dateformat";

export default {
  data() {
    return {
      username: "ms2n_xxx",
      start_time: null,
      end_time: null,
      searchWords: ["…", "。。", "、、", "・・"],
      userData: {
        name: "",
        profile_image_url: "",
        id: "",
        protected: false,
        username: "",
      },
      tweets: [],
      isLoding: false,
      showResult: false,
      hasError: false,
    };
  },
  methods: {
    analyzeByTwitter() {
      this.hasError = false;
      this.isLoding = true;
      this.showResult = true;
      this.getTweets().then(() => {});
    },
    async getTweets() {
      await this.axios
        .get("/api/twitter/" + this.username, {
          params: {
            start_time:
              this.start_time instanceof Date
                ? dateFormat(this.start_time, "isoDate")
                : null,
            end_time:
              this.end_time instanceof Date
                ? dateFormat(this.end_time, "isoDate")
                : null,
          },
        })
        .then((response) => {
          this.tweets = response.data.tweets;
          this.userData = response.data.userData;
        })
        .catch((error) => {
          this.hasError = true;
        })
        .then(() => {
          this.isLoding = false;
        });
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
