<script setup>
import Button from "primevue/button";
import Chips from "primevue/chips";
import FileUpload from "primevue/fileupload";
import Calendar from "primevue/calendar";
</script>
<template>
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
  <label>トーク履歴</label>
  <div class="mb-2">
    <FileUpload
      @select="readfile"
      name="file[]"
      mode="basic"
      accept=".txt"
      chooseLabel="ファイルを選択"
      class="w-full"
    >
      <template #empty>
        <p class="m-0 text-center">ドラッグ&ドロップでファイルを選択</p>
      </template>
    </FileUpload>
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
  <div class="flex justify-content-center mb-3">
    <Button label="解析する" type="button" @click="$parent.showResult = true" />
  </div>
</template>
<script>
export default {
  data() {
    return {
      file: null,
      text: "",
    };
  },
  methods: {
    async readfile(e) {
      this.$parent.text = await e.files[0].text();
    },
  },
};
</script>
