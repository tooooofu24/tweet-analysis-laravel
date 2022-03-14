<template>
  <div>
    <LineFormComponent></LineFormComponent>
  </div>
</template>
<script>
import LineFormComponent from "./LineFormComponent.vue";
// import LineResultComponent from "./LineResultComponent.vue";

export default {
  data() {
    return {
      searchWords: ["…", "。。", "、、", "・・"],
    };
  },
  methods: {},
  components: {
    LineFormComponent,
  },
};
</script>
