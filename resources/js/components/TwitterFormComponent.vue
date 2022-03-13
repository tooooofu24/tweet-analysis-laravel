<script setup>
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Chips from "primevue/chips";
</script>
<template>
  <form action="" @submit.prevent="$parent.analyzeByTwitter()">
    <div class="p-inputgroup mb-2">
      <span class="p-inputgroup-addon">
        <i class="pi pi-search mr-2"></i>
        検索ワード
      </span>
      <Chips
        v-model="$parent.searchWords"
        class="p-chips"
        :addOnBlur="true"
        :allowDuplicate="false"
      />
    </div>
    <div class="p-inputgroup mb-3">
      <InputText
        placeholder="Your Account Id"
        class="p-inputtext-lg"
        v-model="$parent.username"
        required
      />
      <Button label="解析する" type="submit" />
    </div>
  </form>
</template>
<script>
export default {};
</script>