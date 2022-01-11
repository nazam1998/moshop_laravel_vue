<template>
  <div>
    <h2 class="my-5 text-center">{{ shop.name }}</h2>
    <v-btn class="my-5 mx-auto" color="primary" href="/product/create">Add Product</v-btn>
    <v-row>
      <v-col cols="4" v-for="product in shop.products" :key="product.id">
        <v-card elevation="2" outlined shaped tile>
          <v-container>
            <v-img
              max-height="150"
              max-width="250"
              :src="'/storage/' + product.cover_path"
            />
            <v-card-title>{{ product.name }}</v-card-title>
            <v-card-text>{{ product.description }}</v-card-text>
            <v-card-actions>
              <v-form :action="'/product/' + product.id + '/edit'" method="GET">
                <v-btn type="submit" color="secondary"><v-icon>edit</v-icon> Edit Product</v-btn>
              </v-form>
              <v-form :action="'/product/' + product.id" method="POST">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="_token" :value="csrf" />
                <v-btn type="submit" color="error"><v-icon>delete</v-icon> Delete Product</v-btn>
              </v-form>
            </v-card-actions>
          </v-container>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
export default {
  name: "MyShop",
  props: {
    shop: Object,
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  mounted() {
    console.log(this.shop);
  },
};
</script>
<style>
</style>
