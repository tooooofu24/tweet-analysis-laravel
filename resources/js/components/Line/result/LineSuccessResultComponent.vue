<script setup>
import Panel from "primevue/panel";
import Chip from "primevue/chip";
import Badge from "primevue/badge";
import Skeleton from "primevue/skeleton";
</script>

<template>
  <Panel header="解析結果" v-if="$parent.counts">
    <div v-for="(value, key) in $parent.counts" :key="key">
      <div v-if="key">
        <span class="mr-3">{{ key }}</span>
        <span v-for="(count, word) in value" :key="word" class="p-2">
          <Chip :label="word" class="px-2" v-badge="count" />
        </span>
      </div>
    </div>
  </Panel>
  <Panel header="解析結果" v-else>
    <Message severity="error" :closable="false"
      >エラーが発生しました。検索したユーザーが公開アカウントであることを確認してもう一度お試しください。</Message
    >
  </Panel>
</template>