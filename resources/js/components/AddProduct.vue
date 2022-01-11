<template>
  <v-form action="/product" method="POST" enctype="multipart/form-data">
    <v-text-field type="hidden" name="_token" :value="csrf"></v-text-field>
    <v-container>
      <v-row>
        <v-col cols="12" md="6">
          <v-text-field
            v-model="name"
            label="Name"
            name="name"
            required
          ></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-file-input
            accept="image/*"
            name="image"
            label="Picture"
          ></v-file-input>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field
            v-model="price"
            label="Price"
            name="price"
            type="number"
            min="0"
            step=".01"
            required
          ></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field
            v-model="stock"
            label="Stock"
            name="stock"
            type="number"
            min="0"
            required
          ></v-text-field>
        </v-col>
        <v-col cols="12" md="12">
          <v-textarea
            v-model="description"
            label="Description"
            name="description"
            required
          ></v-textarea>
        </v-col>

        <v-btn type="submit"><v-icon>add</v-icon>Add</v-btn>
      </v-row>
    </v-container>
  </v-form>
</template>
<script>
export default {
  name: "Register",
  data() {
    return {
      name: null,
      description: null,
      price: 0,
      stock: 0,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
};
</script>
<style>
</style>
