<template>
  <v-form action="login" method="post">
    <v-text-field type="hidden" name="_token" :value="csrf"></v-text-field>
    <v-container>
      <v-row>
        <v-col cols="12" md="6">
          <v-text-field
            v-model="email"
            label="E-mail"
            name="email"
            type="email"
            required
          ></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field
            v-model="password"
            name="password"
            label="Password"
            type="password"
            required
          ></v-text-field>
        </v-col>
        <v-btn type="submit">Login</v-btn>
      </v-row>
    </v-container>
  </v-form>
</template>
<script>
export default {
  name: "Register",
  data() {
    return {
      email: null,
      password: null,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
};
</script>
<style>
</style>
