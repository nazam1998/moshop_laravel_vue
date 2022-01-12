<template>
  <v-container class="my-10 mx-auto">
    <v-row>
      <v-col cols="12" v-for="shop in shops" :key="shop.id">
        <v-card>
          <v-card-title>{{ shop.name }}</v-card-title>
          <v-card-actions>
            <v-btn :href="'/shop/' + shop.id">View Shop</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  name: "Shops",
  props: {
    shops: Array,
  },
};
</script>
<style>
</style>
