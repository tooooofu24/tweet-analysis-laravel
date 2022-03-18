<template>
  <div>
    <LineFormComponent></LineFormComponent>
    <LineResultComponent></LineResultComponent>
  </div>
</template>
<script>
import LineFormComponent from "./LineFormComponent.vue";
import LineResultComponent from "./LineResultComponent.vue";

export default {
  data() {
    return {
      searchWords: ["…", "。。", "、、", "・・"],
      text: "",
    };
  },
  methods: {
    countReg(text, reg) {
      return (text.match(new RegExp(reg, "g")) || []).length;
    },
  },
  computed: {
    textData() {
      var result = this.text.split("\r\n");
      let date = "";
      let response = {};
      result.forEach((element, index) => {
        if (new RegExp("^[0-9]{4}/[0-9]{2}/[0-9]{2}(.)").test(element)) {
          // 日付
          date = element.slice(0, 10);
          response[date] = {};
        }
        if (new RegExp("^[0-9]{2}:[0-9]{2}").test(element)) {
          // メッセージ
          var data = element.split("\t");
          var time = data[0];
          var name = data[1];
          var msg = data[2];
          if (response[date][name] == undefined) {
            response[date][name] = [msg];
          } else {
            response[date][name].push(msg);
          }
        }
      });
      return response;
    },
    counts() {
      let response = {};
      for (var index in this.textData) {
        var data = this.textData[index];
        for (var key in data) {
          if (response[key] == undefined) {
            response[key] = {};
            this.searchWords.forEach((element, index) => {
              response[key][element] = 0;
            });
          }
          for (var i in data[key]) {
            this.searchWords.forEach((element, index) => {
              response[key][element] += this.countReg(data[key][i], element);
            });
          }
        }
      }
      return response;
    },
  },
  components: {
    LineFormComponent,
    LineResultComponent,
  },
};
</script>
