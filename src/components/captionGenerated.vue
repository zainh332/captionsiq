<template>
    <section class="ctn" >
        <div class="px-4 max-w-7xl mx-auto">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-xl sm:text-3xl font-medium mb-2 linear">Caption Generated</h1>
                <p class="text-center text-gray">It is a long established fact that a reader will be distracted</p>
            </div>
            <div class="grid grid-col-1 lg:grid-cols-2 justify-items-betweeen mt-4 sm:mt-20 gap-5">
                <img :src="Mask" alt="">
                <div class="space-y-4">
                    <div v-for="(item, index) in items" :key="index"
                        class="flex flex-col sm:flex-row items-end sm:items-center justify-between sm:gap-4 bg-white shadow-md px-3 py-4 rounded-lg">
                       <div class="flex items-start sm:items-center justify-between gap-4">
                        <span
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-linear font-bold text-2xl text-white p-2">{{item.number }}</span>
                        <div class="flex-1 font-medium">
                            <p>{{ item.content }}</p>
                        </div>
                       </div>
                        <div class="bg-linear p-0.5 rounded-lg w-fit">
                            <button class="bg-white py-2 px-2.5 rounded-md">
                                <IconCopy />
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-start gap-2 sm:gap-6">
                       <div class="bg-linear rounded-full p-0.5 w-full max-w-xs mx-auto sm:w-fit">
                        <div class="bg-white hover:bg-transparent rounded-full">
                            <button class="rounded-full px-6 py-2 text-center bg-white linear-btn font-medium w-full">Regenerate</button>
                        </div>
                       </div>
                       <div class="border-2 rounded-full border-transparent hover:border-[#EC047A] w-full max-w-xs mx-auto">
                         <button class="bg-linear-secondary text-white font-medium px-6 py-2.5 rounded-full w-full">Post on Instagram</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import Mask from "../assets/images/Mask.png";
import IconCopy from "../components/icons/IconCopy.vue";
const items = [
  { number: '01', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '02', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '03', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '04', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '05', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
];
</script>