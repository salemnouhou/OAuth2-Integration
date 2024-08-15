<template>
<div class="container mx-auto">
   
   <div>
        <h1 class="font-black flex justify-center">Signin to Sam Oauth2</h1>
        <div v-if="errorMessage" class="bg-red-500 border-1 rounded-xl p-1 text-white text-center mt-4">
            {{ errorMessage }}
        </div>


    <form id="loginform" @submit="handleSubmit">

        <input v-model="email" class="focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 h-8 border-2 rounded-2xl w-full mt-8 p-2" type="text" placeholder="Email">
        <input type="password" v-model="password" class= "focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 h-8 border-2 rounded-2xl w-full mt-4 p-2"  placeholder="Password">
   
        <div class="flex justify-end">
                <a href="" class="text-gray-400 underline text-sm mt-3">Forget Password ?</a>
            </div>

            <div>
                <button class="border-0 p-1 w-full mt-4 rounded-full text-white bg-orange-600">Sign in</button>
            </div>
    </form>
         
        
        
            

            <div class="border-2 mt-8 border-l-0 border-r-0 border-b-0 mb-5    w-full">
                <span class=" -top-3 -right-1/3 relative flexflex justify-center text-gray-400 mt-5 text-sm ">Or login with</span>
            </div>

            
                <button @click="loginWithGoogle"  class="hover:bg-gray-100 border w-full items-center gap-2 flex rounded-2xl mb-3 border-gray-70 justify-center ">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-4 h-4 " viewBox="0 0 256 262"

                    ><path fill="#4285F4" 
                    d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622l38.755 30.023l2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"/>
                    <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055c-34.523 0-63.824-22.773-74.269-54.25l-1.531.13l-40.298 31.187l-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"/>
                    <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82c0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602z"/>
                    <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0C79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"/></svg>
                    
                   <span class="hover:bg-gray-100" >Google</span> </button>
            

          
                   <button @click="loginWithFacebook" class="hover:bg-gray-100 border w-full items-center gap-2 flex rounded-2xl mb-3 border-gray-70 justify-center ">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 " w viewBox="0 0 256 256"><path fill="#1877F2" d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"/><path fill="#FFF" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z"/></svg>
                   <span class="hover:bg-gray-100" >Facebook</span> </button>
            


                   <button @click="loginWithGitHub" class="hover:bg-gray-100 border w-full items-center gap-2 flex rounded-2xl mb-3 border-gray-70 justify-center ">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-4 w-4" viewBox="0 0 30 30">
    <path d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z"></path>
</svg>
                   <span class="hover:bg-gray-100" >Github</span> </button>
            


                   <button class=" hover:bg-gray-100 border w-full items-center gap-2 flex rounded-2xl mb-3 border-gray-70 justify-center ">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-4 w-4" viewBox="0 0 48 48">
<path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
</svg>
  <span class="hover:bg-gray-100" >Linkedin</span> </button>
            




                   <button class="hover:bg-gray-100 border w-full items-center gap-2 flex rounded-2xl mb-3 border-gray-70 justify-center ">
                    
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
<path fill="#ff5722" d="M6 6H22V22H6z" transform="rotate(-180 14 14)"></path><path fill="#4caf50" d="M26 6H42V22H26z" transform="rotate(-180 34 14)"></path><path fill="#ffc107" d="M26 26H42V42H26z" transform="rotate(-180 34 34)"></path><path fill="#03a9f4" d="M6 26H22V42H6z" transform="rotate(-180 14 34)"></path>
</svg>
                   <span class="hover:bg-gray-100" >Microsoft</span> </button>
            






            <div class="flex justify-center">
                <div class="text-sm  mt-5    text-gray-500"> 
                Don't have an account ? <router-link to="register"><span class="flex justify-center mt-2 text-sm cursor-pointer  text-orange-600 ">Sign Up now</span></router-link> 
            </div>
            </div>
   </div>

   
</div>
</template>



<style>
*{
    background-color:white;
}
</style>


<script setup>


import { ref } from 'vue';
import { useRouter } from 'vue-router';

const email = ref('');
const password = ref('');
const router = useRouter();
const errorMessage = ref('');  
import authService from '../../services/authService';



const loginWithGoogle = () => {
  authService.loginWithGoogle();
};

const loginWithFacebook = () => {
  authService.loginWithFacebook();
};

const loginWithGitHub = () => {
  authService.loginWithGitHub();
};

const loginWithMicrosoft = () => {
  authService.loginWithMicrosoft();
};

const loginWithLinkedIn = () => {
  authService.loginWithLinkedIn();
};





const handleSubmit = async (event) => {
  event.preventDefault(); 

 
  const options = {
    method: 'POST',
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
};

</script>