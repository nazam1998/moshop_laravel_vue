<template>
  <div class="my-10">
    <h3 v-if="cartdetails.length > 0">Your cart</h3>
    <v-row>
      <v-col cols="12" v-for="details in cartdetails" :key="details.id">
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
          <v-card-actions>
            <v-form :action="'/cart/' + details.id" method="POST">
              <v-text-field
                type="hidden"
                name="_token"
                :value="csrf"
              ></v-text-field>
              <v-text-field
                type="hidden"
                name="_method"
                value="DELETE"
              ></v-text-field>
              <v-btn color="orange" type="submit">Remove from cart</v-btn>
            </v-form>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
    <v-btn
      v-if="cartdetails.length > 0"
      href="/cart/confirm"
      class="my-3 mx-auto"
      color="green"
      >Confirm Order</v-btn
    >
    <h3 v-else>You cart is empty</h3>
  </div>
</template>
<script>
export default {
  name: "Cart",
  props: {
    cartdetails: [Object, Array],
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
};
</script>
<style>
</style>
