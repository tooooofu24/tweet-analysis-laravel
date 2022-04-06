<script setup>
import Panel from "primevue/panel";
import Divider from "primevue/divider";
import Avatar from "primevue/avatar";
import Message from "primevue/message";
import Badge from "primevue/badge";
</script>

<template>
  <Panel header="解析結果">
    <div class="flex">
      <div class="flex-0 px-2 flex align-items-center">
        <Avatar icon="pi pi-user" class="h-3rem w-3rem" />
      </div>
      <div class="flex-1 flex align-items-center px-2">
        <div class="text-danger">
          <div class="mb-1">@{{ username }}</div>
          <div>
            <Badge value="ユーザーが見つかりません" severity="danger"></Badge>
          </div>
        </div>
      </div>
    </div>
    <Divider class="p-divider" />
    <div>
      <Message severity="error" :closable="false"
        >エラーが発生しました。検索したユーザーが公開アカウントであることを確認してもう一度お試しください。</Message
      >
    </div>
  </Panel>
</template>
<script>
export default {
  props: ["username"],
};
</script>

