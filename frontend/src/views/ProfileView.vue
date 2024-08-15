<template>
  <div class="container mx-auto">
    <div class="flex justify-end">Logout</div>
    <div>
      <h1 class="font-black flex justify-center mt-8">
        Welcome <span class="ml-2 mr-2 text-green-500">User</span> !
      </h1>

      <div class="flex justify-center mt-10">
        <div class="h-28 w-28 border-2 rounded-full">
          <img class="object-fit h-full w-full" src="/src/assets/profile.jpg" alt="" />
        </div>
      </div>

      <form @submit="handleSubmit">
      <input
        class="focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 h-8 border-2 rounded-2xl w-full mt-8 p-2"
        type="text"
        value="Email"
        v-model="name"
        
      />

      <input
        class="focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 h-8 border-2 rounded-2xl w-full mt-4 p-2"
        type="text"
        value="Password"
        v-model="email"
      />

      <input
        class="focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 h-8 border-2 rounded-2xl w-full mt-4 p-2"
        type="password"
        value="Password"
        v-model="password"
      />

      <div>
        <button class="border-0 p-1 w-full mt-10 rounded-full text-white bg-orange-600">
          Update my profile
        </button>
      </div>
    </form>
    </div>
  </div>
</template>

<script setup>

import { ref } from 'vue';


const email = ref('email');
const name = ref('name');
const password = ref('password');
const errorMessage = ref(''); 

import { onBeforeMount } from "vue";
import { useRouter } from 'vue-router';
const router = useRouter();
onBeforeMount(() => {
    const pathname = window.location.pathname;
    const segments = pathname.split('/');

    const token = segments[2]; 
    const method = segments[3]; 

    localStorage.setItem('token', token); 

    if(method == "register"){

      router.push('/profile/'+token+'/'+method); 
    }else if(method == "login"){
        router.push('/profile/'+token+'/'+method); 
    }
})

const handleSubmit = async (event) => {
  event.preventDefault(); 

 
  const options = {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      Accept: 'application/json',
    },
    body: JSON.stringify({ email: email.value, password: password.value }),
  };

  try {
    const response = await fetch(import.meta.env.VITE_API_LOGIN, options);
    if (response.ok) {
      const data = await response.json();
      
      if (data.success) {
        console.info("user logged")
        localStorage.setItem('token', data.token); 
        const token = data.token

        const method = "login"
        router.push('/profile/'+token+'/'+method); 
      } else {
        console.error('Login failed:', data.message);
        errorMessage.value = 'Login failed: ' + data.message; 
        setTimeout(() => {
     errorMessage.value = ""
    }, "3000");
        
      }
    } else {
      const errorData = await response.json();
      console.error('Login failed:', errorData.message);
      errorMessage.value = 'Login failed: ' + errorData.message;
        setTimeout(() => {
     errorMessage.value = ""
    }, "3000");
     
    }
  } catch (error) {
    console.error('Error during login:', error);
    errorMessage.value = 'an error occured please try later'; 
  }
}
</script>


<style>
* {
  background-color: white;
}
</style>
