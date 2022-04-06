<script setup>
import Panel from "primevue/panel";
import Divider from "primevue/divider";
import Skeleton from "primevue/skeleton";
</script>

<template>
  <Panel header="解析結果">
    <div class="flex">
      <div class="flex-0 px-2 flex align-items-center">
        <Skeleton shape="square" class="h-3rem w-3rem" />
      </div>
      <div class="flex-1 flex align-items-center px-2">
        <div>
          <Skeleton width="6rem" height="1.3rem" class="my-1" />
          <Skeleton width="6rem" height="1.3rem" class="my-1" />
        </div>
      </div>
    </div>
    <Divider class="p-divider" />
    <div class="flex align-items-center flex-wrap">
      <Skeleton borderRadius="2rem" height="2rem" width="3.5rem" class="mx-2" />
      <Skeleton borderRadius="2rem" height="2rem" width="3.5rem" class="mx-2" />
      <Skeleton borderRadius="2rem" height="2rem" width="3.5rem" class="mx-2" />
      <Skeleton borderRadius="2rem" height="2rem" width="3.5rem" class="mx-2" />
    </div>
  </Panel>
</template>
