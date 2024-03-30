<template>
  <div class="">
    <Navbar :login="false" />
    <section class="ctn">
      <Pricing />
    </section>
    <Package />
    <section class="ctn">
      <FAQs />
    </section>
    <Footer />
  </div>
</template>

<script setup>
import Navbar from "../components/Navbar.vue";
import Package from "../components/Package.vue";
import Pricing from "../components/Pricing.vue";
import Footer from "../components/Footer.vue";
import FAQs from "../components/FAQs.vue";
</script>