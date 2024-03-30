<template>
    <section class="ctn px-4" >
        <div class="max-w-5xl mx-auto text-center">
            <div class="w-fit mx-auto mb-4">
                <h1 class="text-xl sm:text-3xl font-medium linear">Can we help you?</h1>
            </div>
            <div class="bg-white shadow border border-slate-200 rounded-md max-w-sm mx-auto flex items-center justify-between px-3 text-gray">
                <input class="border-0 bg-transparent focus:outline-none flex-1 py-3" placeholder="Search" type="text" name="" id="">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
            <section class="ctn space-y-6">
                <h1 class="text-2xl font-medium text-left">Submit a request</h1>
                <div class="space-y-6">
                    <div class="relative">
                        <label for="name"
                            class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Select a reason</label>
                        <select class="bg-white block w-full rounded-md border-0 px-3 py-4 text-slate-500 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            <option value="" selected>user1023332</option> 
                        </select>
                    </div>
                    <div class="relative">
                        <label for="name"
                            class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Your Email</label>
                        <input type="text" name="name" id="name"
                            class="bg-white block w-full rounded-md border-0 px-3 py-4 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                            placeholder="zainhaider@gmail.com" />
                    </div>
                    <div class="text-sm text-left">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                    <div class="relative">
                        <label for="name"
                            class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Message</label>
                        <textarea placeholder="Write us a message" class="bg-white block w-full rounded-md border-0 px-3 py-4 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6" name="" id="" cols="30" rows="4"></textarea>
                    </div>
                    <div class="text-sm text-left">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                    <div class="text-sm text-left">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                    <div class="w-full flex items-center justify-end">
                        <button
                            class="bg-linear-secondary text-white font-medium px-6 py-2.5 rounded-full flex items-center justify-end gap-2">
                            Save Changes
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </section>
</template>