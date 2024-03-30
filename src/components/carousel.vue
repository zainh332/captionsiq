<template>
  <Carousel ref="carousel" :items-to-show="2.5" :wrap-around="false" v-model="currentSlide" v-bind="settings" :breakpoints="breakpoints">
    <Slide v-for="slide in 10" :key="slide">
          <div class="bg-white shadow-sm shadow-gray rounded-3xl px-5 pb-5 text-start pt-32 relative m-4 overflow-hidden">
          <img class="rounded-bl-full rounded-tl-3xl w-36 absolute top-0 right-0" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHByb2ZpbGV8ZW58MHx8MHx8fDA%3D" alt="">
          <img :src="Qoutation" alt="Qoutation" />
          <p class="text-gray my-2">The power of words is limitless! with the potential to craft captivating imagery,
            use your imagination to run words into amazing visuals.</p>
          <div class="flex flex-col items-start justify-start">
            <span class="linear">Elana Mosco</span>
            <span class="text-gray">Elana Mosco</span>
          </div>
        </div>
    </Slide>

    <template #addons>
    </template>
  </Carousel>
  <div class="flex items-center px-4">
      <button class="bg-white border border-slate-300 p-1 rounded-l-md text-gray" @click="prev">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
      </svg>
      </button>
      <button class="text-[#EC047A] bg-white border border-slate-300 p-1 rounded-r-md" @click="next">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
      </svg>
      </button>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Carousel, Navigation, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'
import { ref } from 'vue';
const currentSlide = ref(0);

export default defineComponent({
  name: 'Breakpoints',
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  data: () => ({
    settings: {
      itemsToShow: 1,
      snapAlign: 'center',
    },
    breakpoints: {
      // 700px and up
      700: {
        itemsToShow: 1,
        snapAlign: 'center',
      },
      1040: {
        itemsToShow: 2,
        snapAlign: 'center',
      },
      // 1024 and up
      1400: {
        itemsToShow: 3,
        snapAlign: 'start',
      },
    },
  }),
  methods: {
    next() {
      this.$refs.carousel.next()
    },
    prev() {
      this.$refs.carousel.prev()
    },
  },
});
</script>
<script setup>
import Qoutation from "../assets/images/Qoutation.png";
</script>