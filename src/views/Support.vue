<template>
    <div class="">
      <Navbar :login="false" />
      <Support />
      <Footer />
    </div>
</template>
  
  <script setup>
  import Navbar from "../components/Navbar.vue";
  import Support from "../components/Support.vue";
  import Footer from "../components/Footer.vue";
  </script>
  