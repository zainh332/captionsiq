<template>
    <section class="ctn relative">
        <div class="">
            <img class="hidden lg:block absolute -top-40 -z-10" :src="calsolLeft" alt="">
            <div class="grid grid-col-1 lg:grid-cols-2 justify-items-center lg:justify-items-baseline gap-5 max-w-7xl mx-auto px-4 py-8 lg:py-28">
                <img :src="fileInput" alt="">
                <div class="flex flex-col items-start justify-center">
                    <h1 class="text-xl sm:text-3xl font-medium mb-2 linear">Introducing AICaption Generator</h1>
                    <p class="text-left text-gray">The power of words is limitless! with the potential to craft captivating imagery, use your imagination to run words into amazing visuals that can share a story never told before.
                    <br>
                    <br>
                    Exploring or creating characters that come to life in your
                    head delving into the complexities of storytelling, is a very rewarding experience.
                    <br>
                    <br>
                    The power of words is limitless! with the potential to craft captivating imagery, use your imagination to run words into amazing visuals that can share a story never told before.</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import calsolLeft from "../assets/images/capsolLeft.png";
import fileInput from "../assets/images/InputField.png";
</script>