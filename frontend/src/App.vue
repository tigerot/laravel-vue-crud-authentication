<script setup>
import Vehicle from './components/VehicleView.vue'
import { RouterView } from 'vue-router'
import { onMounted, ref } from "vue";
import { getAuth, onAuthStateChanged, signOut } from "firebase/auth";
import router from './router'

  const isLoggedIn = ref(false);

  let auth;
  onMounted(() => {
    auth = getAuth();
    onAuthStateChanged(auth, (user) => {
      if(user) {
        isLoggedIn.value = true;
      } else {
        isLoggedIn.value = false;
      }
    });
  });

  const handleSignOut = () => {
    signOut(auth).then(() => {
      router.push("/");
    })
}
</script>

<template>
  <nav>
    <router-link to="/"> Home </router-link>
    <router-link to="/register"> Register </router-link>
    <router-link to="/sign-in"> Sign In </router-link>
    <router-link to="/vehicles"> Vehicles </router-link>
    <button @click="handleSignOut" v-if="isLoggedIn">Sign out</button>
  </nav>
  <router-view />
  </template>
