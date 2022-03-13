<script setup>
import Button from "primevue/button";
</script>

<template>
  <nav
    class="
      bg-primary
      text-white
      px-3
      py-2
      flex
      align-items-center
      justify-content-between
    "
  >
    <div>
      <i class="pi pi-bolt mr-2"></i>
      <span class="font-bold">SNS解析ツール</span>
    </div>
    <div>
      <Button icon="pi pi-bars" class="p-button-text text-white" />
    </div>
  </nav>
</template>
