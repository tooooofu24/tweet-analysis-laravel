<script setup>
import Panel from "primevue/panel";
import Chip from "primevue/chip";
</script>

<template>
  <Panel header="解析結果">
    <div class="flex">
      <div class="flex-0 flex align-items-center justify-content-center px-2">
        <img alt="プロフィール画像" :src="$parent.userData.profile_image_url" />
      </div>
      <div class="flex-0 flex align-items-center justify-content-center px-2">
        {{ $parent.userData.name }}
      </div>
      <div class="flex-1 flex align-items-center justify-content-center">
        <span class="px-2"
          >a
          <!-- <Chip :label="word" class="px-2" v-badge="counts[word]" /> -->
        </span>
      </div>
    </div>
  </Panel>
</template>