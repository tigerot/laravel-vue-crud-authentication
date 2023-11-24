import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyCX2suig89wZHPSB69mcwIdXWoXrec9XgQ",
  authDomain: "bor-holding-laravel-vue.firebaseapp.com",
  projectId: "bor-holding-laravel-vue",
  storageBucket: "bor-holding-laravel-vue.appspot.com",
  messagingSenderId: "150586072374",
  appId: "1:150586072374:web:0cb7c4ab6cfcfcbf97a797"
};

// Initialize Firebase
initializeApp(firebaseConfig);

createApp(App).use(router).mount('#app')
