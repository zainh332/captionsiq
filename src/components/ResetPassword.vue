<template>
    <div>
      <Navbar :login="false" />
      <section class="">
        <form @submit="onSubmit" class="flex justify-center items-center h-screen">
          <div class="w-1/4">
            <main class="p-6 rounded-xl shadow-sm border border-slate-200 space-y-8">
              <div class="text-center">
                <h1 class="text-2xl font-medium">Reset Password</h1>
              </div>
              <div class="space-y-6">
                <div>
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address*</label>
                  <div class="mt-2">
                    <input
                      id="email"
                      name="email"
                      type="email"
                      autocomplete="email"
                      v-model="email"
                      v-bind="emailAttrs"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400"
                    />
                  </div>
                  <span v-if="errors.email" class="text-red-500">{{ errors.email }}</span>
                </div>
                <div>
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password*</label>
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
                <div>
                  <label for="confirmPassword" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password*</label>
                  <div class="mt-2 mb-2">
                    <input
                      type="password" 
                      name="confirmPassword" 
                      id="confirmPassword"
                      v-model="confirmPassword"
                      v-bind="confirmPasswordAttrs"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                  <span v-if="errors.confirmPassword" class="text-red-500">{{ errors.confirmPassword }}</span>
                </div>
                <div class="text-center">
                  <button type="submit" class="bg-linear-secondary text-white font-medium px-6 py-2.5 rounded-full">Reset Password</button>
                </div>
              </div>
            </main>
          </div>
        </form>
      </section>
    </div>
  </template>
  
<script setup>
import axios from 'axios';
import Swal from 'sweetalert2';
import { useForm } from 'vee-validate';
import { useRoute, useRouter } from 'vue-router';
import * as yup from 'yup';
import Navbar from "../components/Navbar.vue";
  
  const route = useRoute();
  const router = useRouter();
  
  const { errors, handleSubmit, defineField, resetForm } = useForm({
    initialValues: {
      email: '',
      password: '',
      confirmPassword: ''
    },
    validationSchema: yup.object({
      email: yup.string().email().required().label('Email'),
      password: yup.string().min(8).required(),
      confirmPassword: yup.string().required().oneOf([yup.ref('password')], 'Passwords do not match').label('Confirm Password')
    })
  });
  
  const [email, emailAttrs] = defineField('email');
  const [password, passwordAttrs] = defineField('password');
  const [confirmPassword, confirmPasswordAttrs] = defineField('confirmPassword');
  
  const onSubmit = handleSubmit(async (values,actions) => {

    var instance = axios.create({
        validateStatus: function (status) {
            return status == 200;
        }
    });

    instance.post('/reset-password', {
            email: values.email,
            password: values.password,
            password_confirmation: values.confirmPassword,
            token: route.params.token
        })
    .then( 
   (response) => { 
    console.log(response);
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Password Reset Successfully',
        }).then((result) => {
      if (result.isConfirmed) {
        // Redirect the user
        router.push('/');
      }
    });
    resetForm();

      
   },
   (error) => {
      console.log(error);
      // actions.setErrors(error.response.data.error);
      if(error.response.data.data){
        console.log(1);
        actions.setErrors(error.response.data.data);
      }
      else{
        console.log(2);
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: error.response.data.error,
        //   text: 'Email already sent!',
        });
      }
    }
   );
  });
  </script>
  