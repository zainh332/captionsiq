<template>
    <section class="ctn lg:!my-32 relative">
        <div class="flex flex-col  lg:flex-row items-start  lg:items-center justify-start">
            <img class="hidden lg:block absolute -top-60 -z-10" :src="calsolLeft" alt="">
            <div class="flex items-center justify-center lg:justify-end flex-1 px-4">
                <div class="  lg:text-white text-center  lg:text-left  lg:max-w-xs space-y-3 2xl:mr-32">
                <h1 class="text-xl sm:text-3xl font-medium">What Our Customers Say</h1>
                <p class="">The power of words is limitless! with the potential to craft captivating imagery, use your imagination to run words share.</p>
            </div>
            </div>
            <div class="max-w-xs sm:max-w-lg lg:max-w-3xl xl:max-w-6xl mx-auto xl:ml-auto">
                <div class="xl:pt-20">
                    <carousel />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import calsolLeft from "../assets/images/capsolLeft.png";
import fileInput from "../assets/images/InputField.png";
import carousel from "../components/carousel.vue";

</script>