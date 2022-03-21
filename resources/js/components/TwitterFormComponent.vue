<script setup>
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Chips from "primevue/chips";
import Calendar from "primevue/calendar";
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
    <label>検索期間</label>
    <div class="p-inputgroup mb-2">
      <span class="p-inputgroup-addon">
        <i class="pi pi-calendar"></i>
      </span>
      <Calendar
        v-model="$parent.start_time"
        dateFormat="yy-mm-dd"
        :maxDate="$parent.end_time"
      />
      <span class="p-inputgroup-addon">~</span>
      <Calendar
        v-model="$parent.end_time"
        :minDate="$parent.start_time"
        dateFormat="yy-mm-dd"
      />
    </div>
    <div class="flex justify-content-center">
      <Button label="解析する" type="submit" />
    </div>
  </form>
</template>
