<template>
   <div class="relative">
    <div class="bg-gradient-to-r from-[#091D2F] to-[#0C2A45] text-slate-300">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 py-20 px-4">
                <div class="">
                    <img class="w-44 lg:w-auto" :src="Logo" alt="">
                    <p class="text-sm mt-3 pr-12">It is a long established fact that a reader will be distracted by the
                        readable.</p>
                </div>
                <ul class="space-y-2">
                    <p class="text-white font-bold">Quick Links</p>
                    <li><router-link to="/collection">Collection</router-link></li>
                    <li><router-link to="/profile">Profile</router-link></li>
                    <li><router-link to="/packages">Packages</router-link></li>
                </ul>
                <ul class="space-y-3">
                    <p class="text-white font-bold">Useful Links</p>
                    <li><router-link to="/contact_us">Contact us</router-link></li>
                    <li><router-link to="/terms&condition">Terms & Conditions</router-link></li>
                </ul>
                <ul class="space-y-2">
                    <p class="text-white font-bold">Follow Us</p>
                    <div class="flex items-center justify-start gap-3">
                        <a href=""><img :src="Link1" alt=""></a>
                        <a href=""><img :src="Link2" alt=""></a>
                        <a href=""><img :src="Link3" alt=""></a>
                        <a href=""><img :src="Link4" alt=""></a>
                        <a href=""><img :src="Link5" alt=""></a>
                    </div>
                </ul>
            </div>
        </div>
        <div class="border-t py-8 text-center col-span-5 bg-linear">
            <p class="text-md font-medium text-white text-center">© 2024 CaptionsIQ | Disclaimer | Privacy & Cookie
                Policy</p>
        </div>
    </div>
   </div>
</template>

<script setup>
import Logo from '../assets/LogoWhite.png';
import Link1 from '../assets/images/Frame 15.png';
import Link2 from '../assets/images/Frame 16.png';
import Link3 from '../assets/images/Frame 17.png';
import Link4 from '../assets/images/Frame 18.png';
import Link5 from '../assets/images/Frame 19.png';
</script>