<template>
    <section class="ctn" >
        <form @submit="onSubmit">
            <div class="grid grid-cols-1 md:grid-cols-8 items-start max-w-7xl mx-auto gap-4 px-4">
                <aside class="col-span-1 md:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 px-4 py-4 md:py-12">
                        <img v-if="store.getters.StateUser.user.image == null" class="w-28 h-28 object-cover rounded-full mx-auto"
                            src="https://images.unsplash.com/photo-1543610892-0b1f7e6d8ac1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHNxdWFyZSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D"
                            alt="">
                            <img v-else class="w-28 h-28 object-cover rounded-full mx-auto"
                            :src="store.getters.StateUser.user.image"
                            alt="">
                        <p class="text-gray text-center mt-2">@{{ store.getters.StateUser.user.user_name }}</p>
                            <!-- File input field -->
                     
                    </div>
                </aside>
                <main class="col-span-1 md:col-span-6 p-4 rounded-xl shadow-sm border border-slate-200 space-y-5">
                    <div class="">
                        <h1 class="text-2xl font-medium">UpdateProfile</h1>
                        <!-- <div class="flex flex-col sm:flex-row sm:items-center gap-3 mt-2">
                            <div class="border-2 rounded-md border-transparent hover:border-[#EC047A] sm:w-fit">
                                <button
                                    class="bg-linear-secondary text-white font-medium px-6 py-2.5 rounded-md flex items-center gap-2 w-full">
                                    <Insta />
                                    Connects Account
                                </button>
                            </div>
                            <button
                                class="flex items-center gap-2 py-3 px-3 rounded-md border border-slate-300 text-slate-500 text-sm font-medium hover:border-slate-800">
                                <Google />
                                Registered With Google
                            </button>
                        </div> -->
                    </div>
                    <div class="space-y-6">
                        <!-- <input type="hidden" name="user_id" id="user_id" v-model="user_id"> -->
                        <div class="relative md:w-[50%]">
                            <label for="name"
                                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Username</label>
                            <input type="text" 
                                name="name" 
                                id="name"
                                class="bg-white block w-full rounded-md border-0 px-3 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Enter Username" 
                                v-model="username"
                                v-bind="usernameAttrs"
                                />
                                <span v-if="errors.username" class="text-red-500">{{ errors.username }}</span>
                        </div>
                        <div class="relative md:w-[50%]">
                            <label for="name"
                                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Email</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name"
                                class="bg-white block w-full rounded-md border-0 px-3 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Enter Email" 
                                v-model="email"
                                v-bind="emailAttrs"
                                />
                                <span v-if="errors.email" class="text-red-500">{{ errors.email }}</span>
                        </div>
                        <div class="relative md:w-[50%]">
                            <label for="name"
                                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name"
                                class="bg-white block w-full rounded-md border-0 px-3 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Enter Name" 
                                v-model="fullname"
                                v-bind="fullnameAttrs"
                                />
                                <span v-if="errors.fullname" class="text-red-500">{{ errors.fullname }}</span>
                        </div>
                        <div class="relative md:w-[50%]">
                            <label for="name"
                                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                id="name"
                                class="bg-white block w-full rounded-md border-0 px-3 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Enter Password" 
                                v-model="password"
                                v-bind="passwordAttrs"
                                />
                                <span v-if="errors.password" class="text-red-500">{{ errors.password }}</span>
                        </div>
                        <div class="relative md:w-[50%]">
                            <label for="confirmPassword"
                                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Confirm Password</label>
                            <input 
                                type="password" 
                                name="confirmPassword" 
                                id="confirmPassword"
                                class="bg-white block w-full rounded-md border-0 px-3 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Confirm Password" 
                                v-model="confirmPassword"
                                v-bind="confirmPasswordAttrs"
                            />
                            <span v-if="errors.confirmPassword" class="text-red-500">{{ errors.confirmPassword }}</span>
                        </div>
                        <div class="relative md:w-[50%]">
                            <label for="image"
                                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-600">Upload Image</label>
                            <input type="file"  
                                name="image" 
                                id="image"
                                class="bg-white block w-full rounded-md border-0 px-3 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Select Image" 
                                ref="file"
        
                                @change="handleFileChange"
                                 >
                            <span v-if="errors.image" class="text-red-500">{{ errors.image }}</span>
                        </div>
                        <!-- <div class="flex items-center justify-between py-3 px-4 border rounded-md border-slate-300">
                            <span class="text-sm text-slate-400">user1052854</span>
                            <Switch v-model="enabled" :class="[enabled ? 'bg-green-500' : 'bg-slate-200', 'relative inline-flex h-6 w-20 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2']">
                                <span class="sr-only">Use setting</span>
                                <span aria-hidden="true" :class="[enabled ? 'translate-x-14' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']" />
                            </Switch>
                        </div>
                        <div class="flex items-center justify-between py-3 px-4 border rounded-md border-slate-300">
                            <span class="text-sm text-slate-400">user1052854</span>
                            <Switch v-model="enabled" :class="[enabled ? 'bg-green-500' : 'bg-slate-200', 'relative inline-flex h-6 w-20 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2']">
                                <span class="sr-only">Use setting</span>
                                <span aria-hidden="true" :class="[enabled ? 'translate-x-14' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']" />
                            </Switch>
                        </div>
                        <div class="text-sm">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                        </div> -->
                        <!-- <div class="">
                            <button
                                class="border border-slate-300 hover:border-slate-800 text-red-500 font-medium px-6 py-2.5 rounded-md flex items-center gap-2">
                                Clear my account
                            </button>
                        </div> -->
                        <div class="flex items-center justify-end gap-4">
                            <div class="border-2 rounded-full border-[#EC047A]">
                                        <button
                                            class="linear text-white font-medium px-6 py-2.5 rounded-full">Cancel
                                            </button>
                                    </div>
                            <button type="submit"
                                class="bg-linear-secondary text-white font-medium px-6 py-2.5 rounded-full flex items-center gap-2">
                                Save Changes
                            </button>
                            
                        </div>
                    </div>
                </main>
            </div>
        </form>
    </section>
</template>

<script setup>
import Google from '../components/icons/Google.vue';
import Insta from '../components/icons/Insta.vue';
import { ref,onMounted,defineProps, defineEmits } from 'vue';
import { Switch } from '@headlessui/vue';
import { useStore } from 'vuex';
import { useForm } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';
import Swal from 'sweetalert2';

const enabled = ref(false);
const store = useStore();
const imagCheck = ref(false);

const handleFileChange = (event) => {
  const file = event.target.files[0];
  if (!file) return; // No file selected

  if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
    setFieldError('image', 'Only image files (JPEG, PNG, GIF) are allowed');
    return;
  }

  // Update form data with the selected file
  image.value = file; // Update the image field with the file object
  errors.value.image = null; // Clear any previous error
};


const { errors, handleSubmit,defineField,resetForm,setFieldError, setErrors } = useForm({
    initialValues: {
      username: store.getters.StateUser.user.user_name,
      email: store.getters.StateUser.user.email,
      password: '',
      fullname : store.getters.StateUser.user.name,
      user_id : store.getters.StateUser.user.id,
      confirmPassword: '',
      image: null,
    },
    validationSchema: yup.object({
      username: yup.string().required().label('Username'),
      fullname: yup.string().required().label('Name'),
      email: yup.string().email().required().label('Email'),
      password: yup.string().nullable(),
      confirmPassword: yup
        .string()
        .oneOf([yup.ref('password')], 'Passwords do not match').label('Confirm Password'), // Use yup.ref() to reference the password field
      image: yup
        .mixed()
        .test('fileType', 'Only image files are allowed', (value) => {
        if (!value) return true; // Return true if no file is selected
        return ['image/jpeg', 'image/png', 'image/gif'].includes(value.type);
        })
        .nullable(),
     
       
    }),
  });

  const [email, emailAttrs] = defineField('email');
  const [password, passwordAttrs] = defineField('password');
  const [username, usernameAttrs] = defineField('username');
  const [fullname, fullnameAttrs] = defineField('fullname');
  const [confirmPassword, confirmPasswordAttrs] = defineField('confirmPassword');
  const [image, imageAttrs] = defineField('image');

  const onSubmit = handleSubmit(async (values,actions) => {
    console.log(values); // send data to API
    const token = store.getters.StateUser.token;

    var instance = axios.create({
        validateStatus: function (status) {
            return status == 200;
        }
    });

instance.post('/profile', {
            username: values.username,
            email: values.email,
            password: values.password,
            fullname: values.fullname,
            user_id: store.getters.StateUser.user.id,
            image: values.image,
            password_confirmation:values.confirmPassword 
        }, {
            headers: {
                Authorization: `Bearer ${token}`,
                'Content-Type': 'multipart/form-data'
                
            }
        }) .then( 
   (response) => { 
    console.log(response);
   
    store.dispatch('updateProfile', response);
        imagCheck.value = store.getters.StateUser.user.image
        console.log('imagCheck',imagCheck);
        
        Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: response.data.message,
        }); 

        // resetForm();
        return;
   },
   (error) => {
      console.log(error);
      actions.setErrors(error.response.data.data);
    }
   );
});



</script>