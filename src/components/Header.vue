<template>
    <section class="ctn">
        <div
            class="grid grid-cols-1 md:grid-cols-3  lg:grid-cols-2 items-center justify-items-end gap-y-10 px-4 max-w-7xl mx-auto">
            <div class="space-y-3 sm:space-y-6 col-span-1 md:col-span-2 lg:col-span-1">
                <h1 class="linear text-xl sm:text-3xl sm:text-4xl font-bold">Free Online ALCaption Generator Image to
                    Text</h1>
                <p>
                    Embrace your inner artist. Create art using artificial intelligence and your own
                    words. By describing what you want to see, Wepik’s AI image generator will make it
                    happen. <span class="font-medium">Try It Out!</span>
                </p>
                <div class="bg-linear p-0.5 rounded-full">
                    <div class="bg-white rounded-full pr-1 pl-3 sm:px-3 py-1 sm:py-3 flex items-center justify-between">
                        <button class="linear font-medium text-xs sm:text-base">Upload Image</button>
                        <div class="flex-1 flex-strech text-end pr-2">
                            <Listbox as="div" v-model="selected">
                                <div class="relative">
                                    <ListboxButton
                                        class="relative cursor-default rounded-md bg-white pl-3 pr-7 text-left text-gray-900 focus:outline-none text-sm font-medium">
                                        <span class="block truncate font-medium">{{ selected?.name }}</span>
                                        <span
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                            <arrowDown />
                                        </span>
                                    </ListboxButton>

                                    <transition leave-active-class="transition ease-in duration-100"
                                        leave-from-class="opacity-100" leave-to-class="opacity-0">
                                        <ListboxOptions
                                            class="absolute right-0 z-10 mt-1 max-h-60 w-fit overflow-auto rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none text-sm text-left">
                                            <ListboxOption as="template" v-for="person in people" :key="person.id"
                                                :value="person" v-slot="{ active, selected }">
                                                <li
                                                    :class="[active ? 'bg-[#EC047A] text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                                    <span
                                                        :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">
                                                        {{ person?.name }}
                                                    </span>

                                                    <span v-if="selected"
                                                        :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                                    </span>
                                                </li>
                                            </ListboxOption>
                                        </ListboxOptions>
                                    </transition>
                                </div>
                            </Listbox>
                        </div>
                        <button
                            class="bg-linear hover:bg-white text-white font-medium px-4 py-1 sm:px-6 sm:py-2 rounded-full text-xs sm:text-base">Upload</button>
                    </div>
                </div>
            </div>
            <div class="">
                <img class="w-[70%] lg:w-auto mx-auto" :src="Header" alt="" />
            </div>
        </div>
    </section>
</template>

<script setup>
import Header from "../assets/images/Header.png";
import arrowDown from "../components/icons/arrowDown.vue";
import { ref } from 'vue';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';

const people = [
    { id: 1, name: 'Select Type' },
    { id: 2, name: 'Friendly' },
    { id: 3, name: 'Professional' },
    { id: 3, name: 'Energetic' },
    { id: 3, name: 'Thoughtful' },
]
const selected = ref(people[0]);
</script>
