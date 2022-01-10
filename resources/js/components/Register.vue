<template>
    <v-form action="register" method="post" enctype="multipart/form-data">

      <v-text-field type="hidden" name="_token" :value="csrf" ></v-text-field>
      <v-container>
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="firstname"
              label="First name"
              name="firstname"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="6">
            <v-text-field
              v-model="lastname"
              label="Last name"
              name="lastname"
              required
            ></v-text-field>
          </v-col>

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
          <v-col cols="12">
            <v-file-input
              accept="image/*"
              name="image"
              label="Picture"
              v-model="image"
            ></v-file-input>
          </v-col>
          <v-btn type="submit">Register</v-btn>
        </v-row>
      </v-container>
    </v-form>
</template>
<script>
export default {
  name: "Register",
  data() {
    return {
      firstname: null,
      lastname: null,
      email: null,
      image: null,
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
