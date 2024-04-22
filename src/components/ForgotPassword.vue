
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
                    <h2 class="mt-2 mb-1 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900" > Forgot Password</h2>
                    <h5 class="mt-4 leading-9 tracking-tight text-center text-gray-900" style="margin-bottom: 20px"> Please enter the Email Address</h5>
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
                              v-bind = "emailAttrs"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400"
                            />
                          </div>
                          <span v-if="errors.email" class="text-red-500">{{ errors.email }}</span>
                        </div>
  
                        <div>
                          <button type="submit" class="modal-btn">Send Email</button>
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
 import { ref , defineProps, reactive} from "vue";
  import Logo from '@/assets/Logo.png'
  import axios from 'axios';
  import { Dialog, DialogPanel, TransitionChild, TransitionRoot} from "@headlessui/vue";
  import { useForm } from 'vee-validate';
  import * as yup from 'yup';
  import Swal from 'sweetalert2';

  // Define props
  const props = defineProps({ open: Boolean });


// Define emits
  const emits = defineEmits(['closeSignInModal']);

  const modalClose = () => {
    props.open = false;
    // Emit the 'close' event
    emits('closeSignInModal');
    // resetForm();
  };


  const { errors, handleSubmit,defineField,resetForm } = useForm({
      initialValues: {
        email: '',
      },
      validationSchema: yup.object({
        email: yup.string().email().required().label('Email'),
      }),
    });

  const [email, emailAttrs] = defineField('email');


  //   const submitForm = (event) => {
  //   event.preventDefault(); // Prevent default form submission (prevent reload page)

  //   axios.post('/api/signup', values, {
  //     headers: {
  //       'X-CSRF-TOKEN': window.Laravel.csrfToken,
  //     }
  //   })
  //   .then((response) => {
  //     if (response.data.status === 'success') {
  //       Swal.fire({
  //         icon: 'success',
  //         title: 'Success!',
  //         text: response.data.msg,
  //       });
  //       // Reset form values
  //       for (let key in values) {
  //         values[key] = "";
  //       }
  //     } else {
  //       Swal.fire({
  //         icon: 'error',
  //         title: 'Error!',
  //         text: response.data.msg,
  //       });
  //     }
  //   })
  //   .catch((error) => {
  //     Swal.fire({
  //       icon: 'error',
  //       title: 'Error!',
  //       text: 'An error occurred while processing your request.',
  //     });
  //     console.error(error); // Log the error to the console for debugging
  //   });
  // }

  const onSubmit = handleSubmit(async (values,actions) => {
    console.log(values); // send data to API
    var instance = axios.create({
        validateStatus: function (status) {
            return status == 200;
        }
    });

    instance.post('/forgot-password', values)
    .then( 
   (response) => { 
    console.log(response);
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Password Reset Link Sent Successfully',
        });
        modalClose();
      
   },
   (error) => {
      console.log(error);
      actions.setErrors(error.response.data.errors);
    }
   );

    resetForm();
  });
</script>
  