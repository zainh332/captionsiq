<template>
  <div class="">
    <Navbar :login="false" />
    <Header />
    <CaptionGenerated />
    <IntroAl />
    <ImageGenerator />
    <Inspired />
    <AiCaption />
    <IntroVideo />
    <Pricing />
    <FAQs />
    <Reviews />
    <Footer />
  </div>
</template>

<script setup>
import Navbar from "../components/Navbar.vue";
import Header from "../components/Header.vue";
import CaptionGenerated from "../components/captionGenerated.vue";
import IntroAl from "../components/IntroAl.vue";
import ImageGenerator from "../components/ImageGenerator.vue";
import Inspired from "../components/Inspired.vue";
import AiCaption from "../components/AiCaption.vue";
import IntroVideo from "../components/IntroVideo.vue";
import Pricing from "../components/Pricing.vue";
import Footer from "../components/Footer.vue";
import FAQs from "../components/FAQs.vue";
import Reviews from "../components/Reviews.vue";
</script>
