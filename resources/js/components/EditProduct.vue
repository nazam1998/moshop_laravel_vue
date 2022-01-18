<template>
  <v-container>
    <v-form
      :action="'/product/' + product.id"
      method="POST"
      enctype="multipart/form-data"
    >
      <v-text-field type="hidden" name="_token" :value="csrf"></v-text-field>
      <v-text-field type="hidden" name="_method" value="PUT"></v-text-field>
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

          <v-btn type="submit"><v-icon>edit</v-icon>Edit</v-btn>
        </v-row>
      </v-container>
    </v-form>
    <v-form
      :action="'/product/' + product.id + '/picture'"
      method="POST"
      enctype="multipart/form-data"
    >
      <v-img
        class="mx-auto mt-6"
        max-height="100"
        max-width="100"
        :src="'/storage/' + product.cover_path"
      ></v-img>
      <v-text-field type="hidden" name="_token" :value="csrf"></v-text-field>
      <v-text-field type="hidden" name="_method" value="PUT"></v-text-field>
      <v-col cols="12" md="6">
        <v-file-input
          accept="image/*"
          name="image"
          label="Picture"
        ></v-file-input>
      </v-col>
      <v-btn type="submit">Edit Picture</v-btn>
    </v-form>
  </v-container>
</template>
<script>
import axios from "axios";
export default {
  name: "Register",
  props: {
    product: Object,
    token: [String, Number],
  },
  data() {
    return {
      name: null,
      description: null,
      price: 0,
      stock: 0,
      image: null,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  mounted() {
    this.name = this.product.name;
    this.description = this.product.description;
    this.price = this.product.price;
    this.stock = this.product.stock;
  },
};
</script>
<style>
</style>
