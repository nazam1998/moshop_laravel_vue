<template>
  <div class="my-10">
    <h4 class="text-center">Order date: {{ order.date }}</h4>

    <h5>Details :</h5>
    <v-row>
      <v-col cols="12" v-for="details in orderdetails" :key="details.id">
        <v-card>
          <v-img
            max-height="100"
            max-width="100"
            :src="'/storage/' + details.product.cover_path"
          ></v-img>
          <v-card-title>{{ details.product.name }}</v-card-title>
          <v-card-text>
            {{ details.product.description }}
          </v-card-text>
          <v-card-text>Quantity: {{ details.quantity }}</v-card-text>
          <v-card-text>Unit Price: {{ details.product.price }}€</v-card-text>
          <v-card-text
            >Total Price:
            {{ details.product.price * details.quantity }}€</v-card-text
          >
        </v-card>
      </v-col>
    </v-row>
    <h4 class="text-center my-5">Total Order Price : {{order.price}}€</h4>
  </div>
</template>
<script>
export default {
  name: "Order",
  props: { order: Object, orderdetails: Array },
};
</script>
<style>
</style>
