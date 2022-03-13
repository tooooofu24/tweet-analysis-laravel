<script setup>
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Panel from "primevue/panel";
import Chips from "primevue/chips";
import Card from "primevue/card";
import Badge from "primevue/badge";
import Chip from "primevue/chip";
import TabView from "primevue/tabview";
import TabPanel from "primevue/tabpanel";
</script>

<template>
  <div>
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
    <main class="p-3">
      <TabView>
        <TabPanel>
          <template #header>
            <i class="pi pi-calendar"></i>
          </template>
          Content I
        </TabPanel>
        <TabPanel>
          <template #header>
            <i class="pi pi-user"></i>
          </template>
          Content II
        </TabPanel>
      </TabView>
    </main>
  </div>
</template>
