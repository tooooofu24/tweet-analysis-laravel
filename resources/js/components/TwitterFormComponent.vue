<script setup>
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Chips from "primevue/chips";
</script>
<template>
  <form action="" @submit.prevent="$parent.analyzeByTwitter()" class="mb-3">
    <label>検索ワード</label>
    <div class="p-inputgroup mb-2">
      <span class="p-inputgroup-addon">
        <i class="pi pi-search"></i>
      </span>
      <Chips
        v-model="$parent.searchWords"
        class="p-chips"
        :addOnBlur="true"
        :allowDuplicate="false"
        placeholder="Enterで追加"
      />
    </div>
    <label>アカウント名(@不要)</label>
    <div class="p-inputgroup mb-2">
      <span class="p-inputgroup-addon">
        <i class="pi pi-user"></i>
      </span>
      <InputText
        placeholder="Username"
        class="p-inputtext"
        v-model="$parent.username"
        required
      />
    </div>
    <div class="flex justify-content-center">
      <Button label="解析する" type="submit" />
    </div>
  </form>
</template>
<script>
export default {};
</script>