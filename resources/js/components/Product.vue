<template>
  <v-card elevation="2" outlined shaped tile>
    <v-container>
      <v-img
        max-height="150"
        max-width="250"
        :src="'/storage/' + product.cover_path"
      />
      <v-card-title>{{ product.name }}</v-card-title>
      <v-card-text>{{ product.description }}</v-card-text>
      <v-card-actions v-if="user && shop.user_id !== user">
        <v-form
          :action="'/cart/' + product.id"
          method="POST"
          v-if="product.stock > 0"
        >
          <input type="hidden" name="_token" :value="csrf" />
          <v-text-field
            label="Quantity"
            name="quantity"
            min="0"
            :max="product.stock"
            v-model="quantity"
            type="number"
          ></v-text-field>
          <v-btn type="submit" color="secondary" v-if="quantity > 0"
            >Add to cart</v-btn
          >
        </v-form>
        <v-btn v-else disabled>Out of stock</v-btn>
      </v-card-actions>
    </v-container>
  </v-card>
</template>
<script>
export default {
  name: "Product",
  props: {
    product: Object,
    shop: Object,
    user: [Number, Object],
  },
  data() {
    return {
      quantity: 0,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  watch: {
    quantity: function (value) {
      if (value > this.product.stock) {
        this.quantity = 0;
      } else if (value < 0) {
        this.quantity = this.product.stock;
      } else {
        this.quantity = value;
      }
    },
  },
};
</script>
<style>
</style>
