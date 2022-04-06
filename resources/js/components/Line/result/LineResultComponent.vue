<script setup>
import Panel from "primevue/panel";
import Chip from "primevue/chip";
import Badge from "primevue/badge";
import Message from "primevue/message";
</script>

<template>
  <Panel header="解析結果" v-if="Object.keys($parent.counts).length == 0">
    <Message severity="error" :closable="false"
      >指定された期間のデータがない、またはエラーが発生しました。</Message
    >
  </Panel>
  <Panel header="解析結果" v-else>
    <div v-for="(value, name) in $parent.counts" :key="name">
      <div v-if="name">
        <div class="my-3">
          <Chip :label="name" icon="pi pi-user" class="bg-primary" />
        </div>
        <div class="flex align-items-center flex-wrap">
          <span v-for="(count, word) in value" :key="word" class="p-2">
            <Chip :label="word" class="px-2" v-badge="count" />
          </span>
        </div>
      </div>
    </div>
  </Panel>
</template>