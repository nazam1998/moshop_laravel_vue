<template>
  <div>
    <v-form :action="'profile/' + profile.id" method="POST">
      <v-text-field type="hidden" name="_method" value="PUT"></v-text-field>
      <v-text-field type="hidden" name="_token" :value="csrf"></v-text-field>
      <v-container>
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="firstname"
              label="First name"
              name="firstname"
              type="text"
              required
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="lastname"
              name="lastname"
              label="Last Name"
              type="text"
              required
            ></v-text-field>
          </v-col>
          <v-btn type="submit">Confirm Change</v-btn>
        </v-row>
      </v-container>
    </v-form>
    <v-form
      :action="'profile/' + profile.id + '/picture'"
      method="POST"
      enctype="multipart/form-data"
    >
      <v-text-field type="hidden" name="_method" value="PUT"></v-text-field>
      <v-text-field type="hidden" name="_token" :value="csrf"></v-text-field>
      <v-container>
        <v-row>
          <v-col cols="12" md="6">
            <v-file-input
              accept="image/*"
              name="image"
              label="File input"
            ></v-file-input>
          </v-col>
          <v-btn type="submit">Edit Picture</v-btn>
        </v-row>
      </v-container>
    </v-form>
  </div>
</template>
<script>
export default {
  name: "EditProfil",
  props: {
    profile: Object,
  },
  mounted() {
    this.firstname = this.profile.firstname;
    this.lastname = this.profile.lastname;
  },
  data() {
    return {
      firstname: null,
      lastname: null,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
};
</script>
<style>
</style>
