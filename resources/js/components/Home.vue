<template>
  <div>
    <h2 class="my-5 text-center">{{ shop.name }}</h2>
    <v-row>
      <v-col cols="4" v-for="product in shop.products" :key="product.id">
        <product :product="product"></product>
      </v-col>
    </v-row>
  </div>
</template>
<script>
import Product from "./Product";
export default {
  name: "Home",
  props: {
    shop: Object,
  },
  components: {
    Product,
  },
  data() {
    return {
      
    };
  },
  mounted() {
    console.log(this.shop);
  },
};
</script>
<style>
</style>
