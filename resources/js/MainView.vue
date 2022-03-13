<script setup>
import Button from "primevue/button";
import TabView from "primevue/tabview";
import TabPanel from "primevue/tabpanel";
</script>

<template>
  <div>
    <NavbarComponent></NavbarComponent>
    <main class="p-3">
      <TabView>
        <TabPanel>
          <template #header>
            <i class="fa-brands fa-twitter fa-xl mr-3"></i>
            Twitter
          </template>
          <TwitterComponent></TwitterComponent>
        </TabPanel>
        <TabPanel>
          <template #header>
            <i class="fa-brands fa-line fa-xl mr-3"></i>
            LINE
          </template>
          <LineComponent></LineComponent>
        </TabPanel>
      </TabView>
    </main>
  </div>
</template>
<script>
import NavbarComponent from "./components/NavbarComponent.vue";
import LineComponent from "./components/LineComponent.vue";
import TwitterComponent from "./components/TwitterComponent.vue";
export default {};
</script>

