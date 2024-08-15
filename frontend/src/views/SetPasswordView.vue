<template>
  <div class="container mx-auto">
    <div>
      <h1 class="font-black flex justify-center mt-5">
        Welcome <span class="ml-2 mr-2 text-green-500">Sam</span> !
      </h1>

      <img class="object-fit h-full w-full" src="/src/assets/safe.png" alt="" />

      <div class="flex justify-center mt-10">
        <div class="w-full border-0 px-1 py-2 bg-green-200 rounded-xl h-full">
          Please define a new password
        </div>
      </div>

      <form @submit.prevent="setPassword">


        <input
          class="focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 h-8 border-2 rounded-2xl w-full mt-8 p-2"
          type="password"
          placeholder="Password"
          v-model="password"
        />

        <div>
          <button type="submit" class="border-0 p-1 w-full mt-10 rounded-full text-white bg-orange-600">
            Set password
          </button>
        </div>


    </form>


    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const password = ref('');
import { onBeforeMount } from "vue";


onBeforeMount(() => {
    const pathname = window.location.pathname;
    const segments = pathname.split('/');

    const tok = segments[2]; 
    console.log(tok)

})



const setPassword = async () => {
 


  try {
    const response = await fetch('http://localhost:8000/api/definepassword', {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${tok}`, 
      },
      body: JSON.stringify({
        password: password.value, 
      }),
    });
    const text = await response.text();
    console.log('Réponse brute:', text);

    if (data.success) {
      
      alert('Mot de passe mis à jour avec succès');
      console.log('Réponse:', data);
    } else {
      console.error('Erreur:', response.statusText);
      alert('Erreur lors de la mise à jour du mot de passe');
    }
  } catch (error) {
    console.error('Erreur lors de la requête:', error);
    alert('Une erreur est survenue');
  }
};
</script>

<style>
* {
  background-color: white;
}
</style>
