import axios from 'axios';

const API_URL = import.meta.env.VITE_API_LOGIN;
const GOOGLE_AUTH_URL = import.meta.env.VITE_API_GOOGLE;
const GOOGLE_CALLBACK_URL = 'http://localhost:8000/api/auth/google/callback'; 
const FACEBOOK_AUTH_URL = import.meta.env.VITE_API_FACEBOOK;
const GITHUB_AUTH_URL = 'http://localhost:8000/api/auth/github/redirect';
const MICROSOFT_AUTH_URL = import.meta.env.VITE_API_MICROSOFT;
const LINKEDIN_AUTH_URL = import.meta.env.VITE_API_LINKEDIN;

export default {

    async loginWithGoogle() {
        window.location.href = GOOGLE_AUTH_URL;

        localStorage.setItem('token', "468464"); 
           
          
      },
    
      

  loginWithFacebook() {

    window.location.href = FACEBOOK_AUTH_URL;

    localStorage.setItem('token', "468464"); 

  },

  loginWithGitHub() {
    window.location.href = GITHUB_AUTH_URL;


    localStorage.setItem('token', "468464"); 
  },

  loginWithMicrosoft() {
    window.location.href = MICROSOFT_AUTH_URL;
  },

  loginWithLinkedIn() {
    window.location.href = LINKEDIN_AUTH_URL;
  }
};
