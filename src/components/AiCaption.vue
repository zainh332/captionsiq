<template>
    <section class="ctn" >
        <div class="px-4 max-w-7xl mx-auto">

            <div class="grid grid-col-1 lg:grid-cols-2 justify-items-center items-center mt-20 gap-5">
                <div class="flex flex-col items-start justify-start">
                    <h1 class="text-xl sm:text-3xl font-medium mb-2 linear">How to make AI-generated Captions</h1>
                    <p class=" text-gray">It is a long established fact that a reader will be distracted</p>
                  <div class="space-y-5 mt-7">
                    <div v-for="item in items" :key="item.id" class="">
                        <h1 class="text-md font-medium">{{ item.heading }}</h1>
                        <p class="text-gray text-sm mt-3">{{ item.description }}</p>
                    </div>
                  </div>
                </div>
                <img :src="QR" alt="">
            </div>
        </div>
    </section>
</template>
<script setup>
import QR from '../assets/images/QrNew.png';

const items = [
  { id: 1, heading: '1. Write your prompt or get inspired by one from our gallery', description: 'The power of words is limitless! with the potential to craft captivating imagery.' },
  { id: 2, heading: '2. Choose the format and style', description: 'The power of words is limitless! with the potential to craft captivating imagery.' },
  { id: 3, heading: '3. Select the one that suits you best, or try again for other results', description: 'The power of words is limitless! with the potential to craft captivating imagery.' },
  { id: 3, heading: '4. Share them wherever you like!', description: 'The power of words is limitless! with the potential to craft captivating imagery.' },
];
</script>