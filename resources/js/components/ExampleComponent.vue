<template>
  <div>
    <h2 class="my-5 text-center">{{ shop.name }}</h2>
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
              <v-btn color="secondary">Add to cart</v-btn>
            </v-card-actions>
          </v-container>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
export default {
  name: "ExampleComponent",
  props: {
    shop: Object,
  },
  mounted() {
    console.log(this.shop);
  },
};
</script>
<style>
</style>
