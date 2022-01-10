<template>
  <v-container class="my-5" app>
    <br />
    <h1 class="my-5 text-center">Welcome {{ user.profile.firstname }}</h1>
    <v-img class="mx-auto" circle max-width="500px" :src="'/storage/' + user.profile.picture_path"></v-img>
    <edit-profil :profile="user.profile"></edit-profil>
  </v-container>
</template>
<script>
export default {
  name: "Dashboard",
  props: ["user"],
};
</script>
<style>
</style>
