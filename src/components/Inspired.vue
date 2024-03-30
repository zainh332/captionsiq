<template>
    <section class="ctn" >
        <div class="max-w-7xl mx-auto text-center sm:mt-44 px-4">
            <h1 class="text-xl sm:text-3xl font-medium mb-2 linear">
                Get inspired with our AI-generated Captions
            </h1>
            <div class="flex flex-wrap justify-center">
                <button v-for="(tab, index) in tabs" :key="index" @click="activeTab = index"
                    :class="{ 'text-[var(--primary-color)]': activeTab === index, 'text-gray-300 hover:bg-gray-200': activeTab !== index }"
                    class="px-4 py-2 mr-2 rounded cursor-pointer w-[40%] sm:w-auto text-left">{{ tab.name }}</button>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:mt-8 px-4">
            <div v-if="activeTab === 0" :key="0">
                <div class="grid grid-col-1 lg:grid-cols-2 justify-items-center mt-4 sm:mt-20 gap-5">
                    <img :src="Mask2" alt="">
                    <div class="space-y-4">
                        <div v-for="(item, index) in items" :key="index"
                            class="flex flex-col sm:flex-row items-end sm:items-center justify-between gap-4 bg-white shadow-md px-3 py-4 rounded-lg">
                            <div class="flex items-start sm:items-center justify-between gap-4">
                                <span
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-linear font-bold text-2xl text-white p-2">{{ item.number
                                    }}</span>
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
                    </div>
                </div>
            </div>
            <div v-if="activeTab === 1" :key="1">
                <div class="grid grid-col-1 lg:grid-cols-2 justify-items-center mt-20 gap-5">
                    <img :src="Mask" alt="">
                    <div class="space-y-4">
                        <div v-for="(item, index) in items" :key="index"
                            class="flex flex-col sm:flex-row items-end sm:items-center justify-between gap-4 bg-white shadow-md px-3 py-4 rounded-lg">
                            <div class="flex items-start sm:items-center justify-between gap-4">
                                <span
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-linear font-bold text-2xl text-white p-2">{{ item.number
                                    }}</span>
                                <div class="flex-1 font-medium">
                                    {{ item.content }}
                                </div>
                            </div>
                            <div class="bg-linear p-0.5 rounded-lg w-fit">
                                <button class="bg-white py-2 px-2.5 rounded-md">
                                    <IconCopy />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="activeTab === 2" :key="2">
                <div class="grid grid-col-1 lg:grid-cols-2 justify-items-center mt-20 gap-5">
                    <img :src="Mask2" alt="">
                    <div class="space-y-4">
                        <div v-for="(item, index) in items" :key="index"
                            class="flex flex-col sm:flex-row items-end sm:items-center justify-between gap-4 bg-white shadow-md px-3 py-4 rounded-lg">
                            <div class="flex items-start sm:items-center justify-between gap-4">
                                <span
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-linear font-bold text-2xl text-white p-2">{{ item.number
                                    }}</span>
                                <div class="flex-1 font-medium">
                                    {{ item.content }}
                                </div>
                            </div>
                            <div class="bg-linear p-0.5 rounded-lg w-fit">
                                <button class="bg-white py-2 px-2.5 rounded-md">
                                    <IconCopy />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="activeTab === 3" :key="3">
                <div class="grid grid-col-1 lg:grid-cols-2 justify-items-center mt-20 gap-5">
                    <img :src="Mask" alt="">
                    <div class="space-y-4">
                        <div v-for="(item, index) in items" :key="index"
                            class="flex flex-col sm:flex-row items-end sm:items-center justify-between gap-4 bg-white shadow-md px-3 py-4 rounded-lg">
                            <div class="flex items-start sm:items-center justify-between gap-4">
                                <span
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-linear font-bold text-2xl text-white p-2">{{ item.number
                                    }}</span>
                                <div class="flex-1 font-medium">
                                    {{ item.content }}
                                </div>
                            </div>
                            <div class="bg-linear p-0.5 rounded-lg w-fit">
                                <button class="bg-white py-2 px-2.5 rounded-md">
                                    <IconCopy />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import Mask from '../assets/images/Mask.png';
import Mask2 from '../assets/images/Mask2.png';
import IconCopy from '../components/icons/IconCopy.vue';

const items = [
  { number: '01', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '02', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '03', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '04', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
  { number: '05', content: 'Woody equal ask saw sir weeks aware decay, Entrance prospect removing.' },
];
const tabs = ref([
  { name: 'Friendly', content: 'Content of Tab 1' },
  { name: 'Professional', content: 'Content of Tab 2' },
  { name: 'Energetic', content: 'Content of Tab 3' },
  { name: 'Thoughful', content: 'Content of Tab 3' },
]);
const activeTab = ref(0);
</script>
