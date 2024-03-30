<template>
    <div class="">
      <Navbar :login="true" />
      <AccountSetting />
      <Footer />
    </div>
</template>
  
  <script setup>
  import Navbar from "../components/Navbar.vue";
  import AccountSetting from "../components/profile_component.vue";
  import Footer from "../components/Footer.vue";
  </script>
  