<script setup>
import Button from "primevue/button";
import TabView from "primevue/tabview";
import TabPanel from "primevue/tabpanel";
</script>

<template>
  <div>
    <NavbarComponent></NavbarComponent>
    <main class="col-12 md:col-10 lg:col-8 xl:col-6 mx-auto p-0">
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
import LineComponent from "./components/Line/LineComponent.vue";
import TwitterComponent from "./components/Twitter/TwitterComponent.vue";
export default {};
</script>

