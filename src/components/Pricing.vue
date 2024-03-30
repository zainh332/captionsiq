<template>
    <section class="ctn" >
      <div class="max-w-5xl mx-auto px-4">
        <div class="text-center">
            <h1 class="text-xl sm:text-3xl font-medium mb-2 linear">Create Great Captions</h1>
        <p class="text-gray">It is a long established fact that a reader will be distracted</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 justify-center gap-4 sm:gap-8 mt-4 sm:mt-20">
          <div class="max-w-xs mx-auto sm:max-w- w-full" v-for="(plan, index) in subscriptionPlans" :key="index" :class="[index % 2 === 0 ? 'bg-white text-black' : 'bg-linear text-white', 'shadow-xl', 'flex', 'flex-col', 'items-center', 'justify-center', 'gap-4', 'rounded-xl','py-4', 'sm:py-8', 'px-10','border','border-slate-200']">
            <h1 class="text-xl sm:text-3xl font-bold">{{ plan.name }}</h1>
            <p v-for="(feature, fIndex) in plan.features" :key="fIndex">{{ feature }}</p>
            <div class="flex flex-col gap-3 sm:gap-5">
              <component v-for="(icon, iIndex) in plan.icons" :key="iIndex" :is="icon" />
            </div>
            <div class="bg-linear rounded-full p-0.5 w-full">
              <button class="group rounded-full bg-white hover:bg-transparent w-full">
                <span class="linear-btn font-medium group-hover:text-white py-2 px-5 flex items-center justify-center gap-3">{{ plan.buttonText }}</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
  
<script setup>
  import IconCross from "../components/icons/cross.vue";
  import IconTick from "../components/icons/Tickwhite.vue";
  import IconTickWhite from "../components/icons/IconTick.vue";
  
  // Define subscription plans with features, icons, and button text
  const subscriptionPlans = [
    {
      name: "Basic",
      features: ["10/day", "20/day", "Limited", "Free Content"],
      icons: [IconCross, IconCross, IconCross, IconCross],
      buttonText: "Free"
    },
    {
      name: "Standard",
      features: ["Unlimited", "Unlimited", "Unlimited", "Unlimited","Unlimited"],
      icons: [IconTickWhite, IconTickWhite, IconTickWhite, IconTickWhite],
      buttonText: "$5 Subscribe"
    },
    {
      name: "Premium",
      features: ["Unlimited", "Unlimited", "Unlimited", "Unlimited"],
      icons: [IconTick, IconTick, IconTick, IconTick],
      buttonText: "$10 Subscribe"
    }
  ];
</script>
  