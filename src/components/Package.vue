<template>
    <section class="ctn" >
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-xl sm:text-3xl font-medium mb-2 linear">Enhance your Caption today</h1>
                <p class="text-center text-gray">It is a long established fact that a reader will be distracted</p>
            </div>
            <div class="grid lg:grid-cols-3 gap-8 py-10">
                <div class="bg-white shadow-lg hover:shadow-xl p-10 rounded-xl max-w-sm mx-auto lg:max-w-auto border border-slate-100">
                    <img class="mx-auto" :src="Verify" alt="">
                    <h2 class="text-2xl font-medium my-3 text-center">Full License</h2>
                    <p class="text-gray text-center">
                        You can use any asset for commercial or personal use without attributing the author. High-quality photos, fonts, vector icons, stickers, and logos ready to use.
                    </p>
                </div>
                <div class="bg-white shadow-lg hover:shadow-xl p-10 rounded-xl max-w-sm mx-auto lg:max-w-auto border border-slate-100">
                    <img class="mx-auto" :src="Taj" alt="">
                    <h2 class="text-2xl font-medium my-3 text-center">Premium content</h2>
                    <p class="text-gray text-center">
                        Download without limits millions of  high quality videos, images, vectors, icons, stickers, 3D, PSD, fonts, or logos. And all of Flaticon. Plus.
                    </p>
                </div>
                <div class="bg-white shadow-lg hover:shadow-xl p-10 rounded-xl max-w-sm mx-auto lg:max-w-auto border border-slate-100">
                    <img class="mx-auto" :src="reload" alt="">
                    <h2 class="text-2xl font-medium my-3 text-center">New assets daily</h2>
                    <p class="text-gray text-center">
                        Discover over 50K new editable assets daily carefully curated. That means 250K photos, fonts, icons, stickers, and logos per week. More than 1.25MM assets per month.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import Verify from "../assets/images/Verify.png";
import Taj from "../assets/images/Taj.png";
import reload from "../assets/images/reload.png";
</script>