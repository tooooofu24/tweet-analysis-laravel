<script setup>
import Panel from "primevue/panel";
import Chip from "primevue/chip";
import Badge from "primevue/badge";
import Divider from "primevue/divider";
import Skeleton from "primevue/skeleton";
</script>

<template>
  <TwitterLoadingResultComponent
    v-if="$parent.isLoding"
  ></TwitterLoadingResultComponent>
  <TwitterErrorResultComponent
    v-else-if="$parent.hasError"
    :username="$parent.username"
  ></TwitterErrorResultComponent>

  <Panel
    :header="`解析結果 (検索対象ツイート：${$parent.tweets.length}件)`"
    v-else
  >
    <div class="flex">
      <div class="flex-0 px-2 flex align-items-center">
        <img
          alt="プロフィール画像"
          :src="$parent.userData.profile_image_url"
          class="h-3rem w-3rem"
        />
      </div>
      <div class="flex-1 flex align-items-center px-2">
        <div>
          <div>@{{ $parent.username }}</div>
          <div>{{ $parent.userData.name }}</div>
        </div>
      </div>
    </div>
    <Divider class="p-divider" />
    <div class="flex align-items-center flex-wrap">
      <span
        v-for="(word, index) in $parent.searchWords"
        :key="index"
        class="p-2"
      >
        <Chip :label="word" class="px-2" v-badge="$parent.counts[word]" />
      </span>
    </div>
  </Panel>
</template>
<script>
import TwitterLoadingResultComponent from "./TwitterLoadingResultComponent.vue";
import TwitterErrorResultComponent from "./TwitterErrorResultComponent.vue";

export default {
  data() {
    return {};
  },
};
</script>
