<template>
    <TransitionRoot as="template" :show="open">
      <Dialog as="div" class="relative z-40" @close="modalClose">
        <!-- Backgound blur -->
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in duration-200"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <div
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
          />
        </TransitionChild>
  
        <div class="fixed inset-0 z-40 overflow-y-auto">
          <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
            <TransitionChild
              as="template"
              enter="ease-out duration-300"
              enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              enter-to="opacity-100 translate-y-0 sm:scale-100"
              leave="ease-in duration-200"
              leave-from="opacity-100 translate-y-0 sm:scale-100"
              leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
              <DialogPanel class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl pt-25 px-14">
               
                <div class="flex-col flex-1 min-h-full py-6 sm:px-6 lg:px-8" >
                  <div class="mb-10 sm:mx-auto sm:w-full sm:max-w-md">
                    <img class="block mx-auto mb-6" :src="Logo" style="margin-left: 50px;"/>
                    <h2 class="mt-2 mb-1 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900" > Sign In</h2>
                    <h5 class="mt-4 leading-9 tracking-tight text-center text-gray-900" style="margin-bottom: 20px"> Welcome, please log in to your account</h5>
                  </div>
  
                  <div class="mt-4 ">
                    <div class="">
                      <form class="space-y-6" @submit="onSubmit">
                        <div>
                          <label
                            for="email"
                            class="block text-sm font-medium leading-6 text-gray-900">
                            Email Address*
                          </label>
                          <div class="mt-2">
                            <input
                              id="email"
                              name="email"
                              type="email"
                              autocomplete="email"
                              v-model="email"
                              v-bind="emailAttrs"
                              autofocus="blur"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400"
                            />
                          </div>
                      
                          <span v-if="errors.email" class="text-red-500">{{ errors.email }}</span>
                        </div>
  
                        <div>
                          <label
                            for="password"
                            class="block text-sm font-medium leading-6 text-gray-900">
                            Password*
                            </label>
                          <div class="mt-2 mb-2">
                            <input
                              id="password"
                              name="password"
                              type="password"
                              autocomplete="current-password"
                              v-model="password"
                              v-bind="passwordAttrs"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                          </div>
                          <span v-if="errors.password" class="text-red-500">{{ errors.password }}</span>
                        </div>
  
                        <!-- <div class="flex items-center justify-between">
                          <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="w-3 h-3 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600" style="margin-right: 5px;"/>
                            <label for="remember-me" class="block ml-3 text-sm leading-6 text-gray-900"> Remember me</label>
                          </div>
                        </div> -->
  
                        <div>
                          <button type="submit" class="modal-btn">Sign in</button>
                        </div>
                      </form>
  
                      <div>
                        <span class="relative flex justify-center px-6 text-sm font-medium leading-6 text-gray-900 bg-white"  @click="OpenSignUpModal">New here? <a href="#" style="color: palevioletred; padding-left: 2%;"> Create an account</a></span>

                        <span class="mt-2 relative flex justify-center px-6 text-sm font-medium leading-6 text-gray-900 bg-white"  @click="OpenForgotPasswordnModal">Forgot Password?</span>

                        <div class="relative mt-10">
                          <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-200" />
                          </div>
  
                          <div class="relative flex justify-center text-sm font-medium leading-6">
                            <span class="px-6 text-gray-900 bg-white">Or continue with</span>
                          </div>
                        </div>
  
                        <div class="grid grid-cols-2 gap-4 mt-4">
                          <button @click = "generateRoute('google')" class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-1 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#1D9BF0] border-2 black">
                          <img src="@/assets/icons8-google-48.png" alt="Google Logo" class="w-5 h-5" />
                            <span class="text-sm font-semibold leading-6">Google</span>
                        </button>
  
                          <button @click = "generateRoute('facebook')" class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-1  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#1D9BF0] border-2 black">
                            <img src="@/assets/images/facebook.png" alt="Google Logo" class="w-5 h-5" />
                            <span class="text-sm font-semibold leading-6">Facbook</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
      
    </TransitionRoot>
    <SignUpModal :open="signUpModal"  @closeSignup="signUpModalClose"/>
    <ForgotPassword :open="forgotPassword" @closeSignInModal="closeForgotPasswordnModal"/>

  </template>
  
<script setup>
 
  import Logo from '@/assets/Logo.png';
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from "@headlessui/vue";
import axios from 'axios';
import Swal from 'sweetalert2';
import { useForm } from 'vee-validate';
import { defineEmits, defineProps, ref } from "vue";
import { useRoute, useRouter } from 'vue-router';
import { useStore } from 'vuex';
import * as yup from 'yup';
import ForgotPassword from "../components/ForgotPassword.vue";
import SignUpModal from "../components/signup.vue";

  const store = useStore();
  const router = useRouter();
  const route = useRoute();

  // Define props
  const props = defineProps({ open: Boolean });

  const signUpModal  = ref(false);
  const OpenSignUpModal = (e) => {
    modalClose();
    signUpModal.value = true;
  };

  const signUpModalClose = () => {  //closes the signup modal when clicked outside
    signUpModal.value = false;
};

  const forgotPassword  = ref(false);
  const OpenForgotPasswordnModal = (e) => {
    modalClose();
    forgotPassword.value = true;
  };
  
  const closeForgotPasswordnModal = (e) => {  //closes the forgot password modal when clicked outside
    forgotPassword.value = false;
  };

  const { errors, handleSubmit,defineField,resetForm } = useForm({
    initialValues: {
      email: '',
      password: '',
    },
    validationSchema: yup.object({
      email: yup.string().email().required().label('Email'),
      password: yup.string().required().label('Password'),
    }),
  });

  const [email, emailAttrs] = defineField('email');
  const [password, passwordAttrs] = defineField('password');


  const onSubmit = handleSubmit(async (values) => {
    console.log(values); // send data to API

      const User = new FormData();
      User.append("email", values.email);
      User.append("password", values.password);
    
      try {
     
        await store.dispatch('LogIn', User);
      // Handle successful sign-in response
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Login Successfully',
        });

        modalClose();

    } catch (error) {
      // Handle sign-in error
      Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: error,
        });
    
    }
    resetForm();
  });

  // Define emits
  const emits = defineEmits(['close']);

  const modalClose = () => {  

    props.open = false;
    // Emit the 'close' event
    emits('close');
    resetForm();
  };

  const generateRoute = (provider) => {
    var instance = axios.create({
      withCredentials: true,
      withXSRFToken : true
    });

    instance.get(`/${provider}/redirectgister`, {
        // Headers should be provided outside of the configuration object
        headers: {
          'Accept': 'application/json',
          'Referer': 'http://127.0.0.1:8000',
        }
    })
    .then(
        (response) => { 
            console.log(response);
            debugger;
            // window.location.href = response.data.redirect;
        },
        (error) => {
            console.log(error);
        }
    );
}


</script>
  