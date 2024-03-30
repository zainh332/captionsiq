<template>
    <div class="">
      <Navbar :login="true" />
      <Collection />
      <Footer />
    </div>
</template>
  
  <script setup>
  import Navbar from "../components/Navbar.vue";
  import Collection from "../components/Collection.vue";
  import Footer from "../components/Footer.vue";
  </script>
  