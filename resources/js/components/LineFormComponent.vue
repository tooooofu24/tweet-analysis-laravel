<script setup>
import Button from "primevue/button";
import Chips from "primevue/chips";
import FileUpload from "primevue/fileupload";
</script>
<template>
  <form action="" @submit.prevent="console.log(file)" class="mb-3">
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
    <div class="mb-2">
      <FileUpload
        name="file[]"
        url="./upload"
        accept=".txt"
        :showUploadButton="false"
        chooseLabel="ファイルを選択"
        cancelLabel="キャンセル"
      >
        <template #empty>
          <p class="m-0 text-center">ドラッグ&ドロップでファイルを選択</p>
        </template>
      </FileUpload>
    </div>
    <div class="flex justify-content-center">
      <Button label="解析する" type="submit" />
    </div>
  </form>
</template>