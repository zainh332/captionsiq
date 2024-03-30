<template>
<nav class="flex items-center justify-between py-5 px-4 xl:px-24">
    <div class="flex items-center justify-between">
        <router-link to="/">
      <img class="w-32 sm:w-auto" :src="Logo" alt="">
    </router-link>
    </div>
    <p class="text-white font-bold">Quick Links</p>
    <div v-if="!login" class="hidden lg:flex items-center justify-center gap-10">
        <a href="/collection">
           <div class="flex items-center gap-1 border-b-2 border-transparent hover:border-[#EC047A]">
            Collection
                <IconArrow />   
           </div>
        </a> 
        <a href="/profile">
           <div class="flex items-center gap-1 border-b-2 border-transparent hover:border-[#EC047A]">
            Profile
                <IconArrow />   
           </div>
        </a> 
        <a href="/contact_us">
           <div class="flex items-center gap-1 border-b-2 border-transparent hover:border-[#EC047A]">
                Contact Us
           </div>
        </a> 
        <a href="/packages">
           <div class="flex items-center gap-1 border-b-2 border-transparent hover:border-[#EC047A]">
            Packages  
           </div>
        </a> 
        <a href="">
           <div class="flex items-center gap-1 border-b-2 border-transparent hover:border-[#EC047A]">
                Support Center  
           </div>
        </a>     
    </div>
    <div v-if="!login" class="flex items-center justify-between gap-4 sm:gap-10">
        <a href="">
            <div class="flex items-center gap-1">
                <IconGlobal />
                EN
             </div>
        </a>
        <div class="flex items-center gap-2">
            <div class="bg-linear rounded-full p-0.5 w-fit ">

<button class="group rounded-full bg-white hover:bg-transparent flex items-center"
     @click="OpenSignInModal">
        <span class="linear-btn font-medium group-hover:text-white sm:py-2 px-3 sm:px-5 flex items-center gap-3 text-sm"> <IconProfile class="hidden sm:block" />Log in</span>
</button>

</div>
<button v-if="!login" @click="isMobileNav()" class="block lg:hidden bg-linear text-white p-1 rounded-md">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
<path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
</svg>
</button>
        </div>
    </div>
    <div v-if="login" class="flex items-center justify-between gap-3">
        <a href="">
            <div class="flex items-center gap-1">
                <img class="w-12 h-12 object-cover rounded-full" src="https://images.unsplash.com/photo-1543610892-0b1f7e6d8ac1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHNxdWFyZSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D" alt="">
             </div>
        </a>
        <div class="">
            <p class="text-[#EC047A]">Welcome</p>
            <p class="text-black font-medium">Zain Haider</p>
        </div>
    </div>
</nav>
<transition name="fade" appear>
    <div v-if="mobileNav" class="flex lg:hidden flex-col items-start justify-start gap-5 px-8">
        <a href="">
           <div class="flex items-center gap-1">
                Design
                <IconArrow />   
           </div>
        </a> 
        <a href="">
           <div class="flex items-center gap-1">
                Features
                <IconArrow />   
           </div>
        </a> 
        <a href="">
           <div class="flex items-center gap-1">
                Brand Kit
           </div>
        </a> 
        <a href="">
           <div class="flex items-center gap-1">
                Blog  
           </div>
        </a> 
        <a href="">
           <div class="flex items-center gap-1">
                Support Center  
           </div>
        </a>     
    </div>
    </transition>
    <SigninModal :open="signInModal"/>
</template>
<script setup>
import Logo from "../assets/Logo.png";
import IconArrow from "../components/icons/arrowDown.vue";
import IconGlobal from "../components/icons/IconGlobal.vue";
import IconProfile from "../components/icons/IconProfile.vue";
import { defineProps , ref } from "vue";
const props = defineProps({
    login: Boolean
});
const mobileNav = ref(false);
const isMobileNav = () =>{
mobileNav.value = !mobileNav.value;
};
import SigninModal from "../components/signin.vue";

const signInModal  = ref(false);
const OpenSignInModal = (e) => {
  signInModal.value = true;
  // signInModal.value = !signInModal.value;
};
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
}

</style>
