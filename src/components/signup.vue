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
                    <h2 class="mt-2 mb-1 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900" > Sign Up</h2>
                    <h5 class="mt-4 leading-9 tracking-tight text-center text-gray-900" style="margin-bottom: 20px"> Welcome, please fill the fileds</h5>
                  </div>
  
                  <div class="mt-4 ">
                    <div class="">
                      <form class="space-y-6" @submit="onSubmit">
                        <div>
                          <label
                            for="username"
                            class="block text-sm font-medium leading-6 text-gray-900">
                            Username*
                          </label>
                          <div class="mt-2">
                            <input
                              id="username"
                              name="username"
                              type="username"
                              autocomplete="username"
                              v-model="username"
                              v-bind="usernameAttrs"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400"
                            />
                          </div>
                          <span v-if="errors.username" class="text-red-500">{{ errors.username }}</span>
                        </div>
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
  
                        <div class="flex items-center justify-between">
                          <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="w-3 h-3 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600" style="margin-right: 5px;"/>
                            <label for="remember-me" class="block ml-3 text-sm leading-6 text-gray-900"> Remember me</label>
                          </div>
                        </div>
  
                        <div>
                          <button type="submit" class="modal-btn">Sign Up</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </template>
  
  <script setup>
 import { ref , defineProps, defineEmits} from "vue";
  import Logo from '@/assets/Logo.png'
  import axios from 'axios';
  import { Dialog, DialogPanel, TransitionChild, TransitionRoot} from "@headlessui/vue";
  import { useForm } from 'vee-validate';
  import * as yup from 'yup';

  // Define props
  const props = defineProps({ open: Boolean });


  const { errors, handleSubmit,defineField,resetForm } = useForm({
    initialValues: {
      username: '',
      email: '',
      password: '',
    },
    validationSchema: yup.object({
      username: yup.string().required().label('Username'),
      email: yup.string().email().required().label('Email'),
      password: yup.string().min(6).required().label('Password'),
    }),
  });

  const [email, emailAttrs] = defineField('email');
  const [password, passwordAttrs] = defineField('password');
  const [username, usernameAttrs] = defineField('username');


// Define emits
const emits = defineEmits(['closeSignup']);

const modalClose = () => {
  
  props.open = false;
  // Emit the 'close' event
  emits('closeSignup');
  // resetForm();
};

const onSubmit = handleSubmit(async (values) => {
    console.log(values); // send data to API 
    try {
      const response = await axios.post('/api/signup', {
        username: values.username,
        email: values.email,
        password: values.password
      });

   
      // Handle successful sign-in response
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: response.data.message,
        });

        // Optionally, redirect the user after successful sign-in
        router.push('/collection');
      

    } catch (error) {
      // Handle sign-in error
      Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: (error.response) ? error.response.data.message : 'An Error Occured',
        });
      console.log(error);
    
    }
  resetForm();
});
</script>
  