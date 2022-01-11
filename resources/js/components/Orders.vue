<template>
  <div class="my-10">
    <v-row>
      <v-col cols="12">
        <v-row>
          <v-col cols="3">ID</v-col>
          <v-col cols="3">Date</v-col>
          <v-col cols="3">Total</v-col>
          <v-col cols="3"></v-col>
        </v-row>
      </v-col>
      <v-col cols="12" v-for="order in orders" :key="order.id">
        <v-row>
          <v-col cols="3">{{ order.id }}</v-col>
          <v-col cols="3">{{ order.date }}</v-col>
          <v-col cols="3">{{ order.price }}</v-col>
          <v-col cols="3"
            ><v-btn :href="'/order/' + order.id">View Details</v-btn></v-col
          >
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>
<script>
export default {
  name: "Orders",
  props: ["orders"],
};
</script>
<style>
</style>
