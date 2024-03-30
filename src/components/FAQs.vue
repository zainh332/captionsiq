<template>
  <div class=" max-w-3xl mr-auto sm:mx-auto px-12 text-center my-5 md:my-20 px-6 md:px-6 lg:px-10">
    <div class="h-1 bg-gradient-to-r from-secondaryblue to-secondarypink w-24 my-3 mx-auto "></div>
    <h1 class="text-xl sm:text-3xl font-medium mb-2 linear">Frequent questions</h1>
    <p class="text-gray">It is a long established fact that a reader will be distracted</p>
  </div>
  <div class="faq-section space-y-3 md:space-y-5 px-6">
    <div class=" bg-white rounded-xl px-4 md:px-10 py-5 max-w-7xl mx-auto shadow"
      v-for="(question, index) in faqList" :key="index">
      <button @click="toggleFAQ(index)" class="w-full text-left  py-2 focus:outline-none">
        <div class="flex justify-between items-center">
          <span class="text-sm sm:text-lg font-medium text-gray-800">{{ question.question }}</span>
          <div class="min-w-[30px]">
            <span class="material-icons" :class="{ 'rotate-45': activeIndex === index }"><img class="w-8 h-8"
                :src="Plus" alt=""></span>
          </div>
        </div>
      </button>
      <transition name="fade">
        <div v-if="activeIndex === index" class="mt-2 text-gray">
          <p>{{ question.answer }}</p>
        </div>
      </transition>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import Logo from '../assets/Logo.png';
import Plus from '../assets/images/Group 34.png';
const faqList = ref([
  { question: 'What is CaptionsIQ?', answer: 'Tailwind CSS is a utility-first CSS framework for quickly building custom designs.' },
  { question: 'How does Soroban Blockchain benefit CaptionsIQ?', answer: 'You can install Tailwind CSS via npm or yarn and then configure it in your project.' },
  { question: 'What are the benefits of using CaptionsIQ for freelancers?', answer: 'Vue 3 is the latest version of the Vue.js framework, offering improved performance and new features.' },
  { question: 'What is CaptionsIQ?', answer: 'Tailwind CSS is a utility-first CSS framework for quickly building custom designs.' },

  { question: 'What are the benefits of using CaptionsIQ for clients?', answer: 'Tailwind CSS is a utility-first CSS framework for quickly building custom designs.' },

]);

const activeIndex = ref(-1);

const toggleFAQ = (index) => {
  activeIndex.value = activeIndex.value === index ? -1 : index;
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.rotate-180 {
  transform: rotate(180deg);
}
</style>