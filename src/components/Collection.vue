<template>
    <section class="ctn" >
        <div class="grid grid-cols-1 md:grid-cols-8 items-start max-w-7xl mx-auto gap-4 px-4">
            <aside class="col-span-1 md:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 px-4 py-4 md:py-8">
                    <img class="w-28 h-28 object-cover rounded-full mx-auto"
                        src="https://images.unsplash.com/photo-1543610892-0b1f7e6d8ac1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHNxdWFyZSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D"
                        alt="">
                    <p class="text-gray text-center mt-2">@user1052854</p>
                </div>
            </aside>
            <main class="col-span-1 md:col-span-6 p-4 rounded-xl shadow-sm border border-slate-200 space-y-5">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="">
                        <h1 class="text-xl sm:text-3xl font-medium">Collection</h1>
                        <p class="text-gray">By user1023332</p>
                    </div>
                    <div class="flex items-center justify-end sm:justify-start gap-2">
                        <button
                            class="text-white px-2 py-1.5 rounded-md bg-red-500 hover:bg-white hover:shadow hover:text-red-500">
                            <Trash />
                        </button>
                        <button
                            class="px-2 py-1.5 rounded-md border border-slate-200 text-slate-400 hover:bg-red-500 hover:text-white">
                            <Share />
                        </button>
                        <button
                            class="px-2 py-1.5 rounded-md border border-slate-200 text-slate-400 flex items-center gap-2 hover:bg-red-500 hover:text-white">
                            <Filter />
                            Filter
                        </button>
                    </div>
                </div>
                <div class="space-y-5">
                    <div v-for="(item, index) in items" :key="index"
                        class="sm:p-4 py-4 sm:rounded-xl sm:shadow-sm grid grid-cols-1 xl:grid-cols-5 items-center gap-4 border-b sm:border border-slate-200">
                        <img class="col-span-1 w-44 lg:w-full h-44 object-cover rounded-xl shadow border border-slate-200"
                            :src="item.imageUrl" alt="">
                        <div class="col-span-4 flex flex-col items-start justify-between h-full gap-4">
                            <p>{{ item.description }}</p>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-8">
                                <p class="text-gray text-sm font-medium flex items-center gap-2">
                                    <Calender />
                                    {{ item.date }}
                                </p>
                                <div v-if="item.postOnInsta" class="border-2 rounded-full border-transparent hover:border-[#EC047A]">
                                    <button
                                        class="bg-linear-secondary text-white font-medium px-6 py-2.5 rounded-full">Posted
                                        on Instagram</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>
</template>

<script setup>
import Trash from '../components/icons/Trash.vue';
import Share from '../components/icons/Share.vue';
import Filter from '../components/icons/Filter.vue';
import Calender from '../components/icons/Calender.vue';
const postOnInsta = ref(false);
import {ref} from 'vue';
const items = [
    {
        imageUrl: 'https://images.unsplash.com/photo-1505033575518-a36ea2ef75ae?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHNxdWFyZSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D',
        description: 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage',
        date: '12th May 2021',
        postOnInsta: true
    },
    {
        imageUrl: 'https://images.unsplash.com/photo-1505033575518-a36ea2ef75ae?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHNxdWFyZSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D',
        description: 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage',
        date: '12th May 2021'
    },
    {
        imageUrl: 'https://images.unsplash.com/photo-1505033575518-a36ea2ef75ae?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHNxdWFyZSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D',
        description: 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage',
        date: '12th May 2021'
    },
];
</script>