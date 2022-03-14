<script setup>
import Panel from "primevue/panel";
import Chip from "primevue/chip";
import Badge from "primevue/badge";
</script>

<template>
  <Panel header="解析結果">
    <div class="flex mb-3">
      <div class="flex-0 flex align-items-center justify-content-center px-2">
        <img alt="プロフィール画像" :src="$parent.userData.profile_image_url" />
      </div>
      <div class="flex-0 flex align-items-center justify-content-center px-2">
        {{ $parent.username }}
      </div>
      <div class="flex-0 flex align-items-center justify-content-center px-2">
        {{ $parent.userData.name }}
      </div>
    </div>
    <div class="flex align-items-center">
      <span
        v-for="(word, index) in $parent.searchWords"
        :key="index"
        class="px-2"
      >
        <Chip :label="word" class="px-2" v-badge="$parent.counts[word]" />
      </span>
    </div>
  </Panel>
</template>