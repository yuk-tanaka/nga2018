<template>
  <div>
    <b-row>
      <b-col xs="12" sm="6" md="6" lg="3" class="center-block" v-for="shop in nearbyShops" :key="shop.id">
        <h4 class="h5">
        <a :href="shop.show_url"><b>{{shop.name}}</b></a>
      </h4>
        <div class="list">
          <dl>
            <dt><i class="fas fa-glass-martini"></i></dt>
            <dd><b>{{shop.brewery.prefecture}}・{{shop.brewery.name}}</b></dd>
          </dl>
          <dl>
            <dt><i class="fas fa-clock"></i></dt>
            <dd>{{shop.business_hours}}</dd>
          </dl>
          <dl>
            <dt><i class="fas fa-map-marker-alt"></i></dt>
            <dd><a :href="shop.gmap_url" target="_blank">{{shop.distance}} m</a></dd>
          </dl>
        </div>
      </b-col>
    </b-row>
  </div>
</template>

<style scoped>
  .list dl {
    display: table;
  }

  .list dt, dd {
    display: table-cell;
  }

  .list dd {
    padding-left: 1em;
  }
</style>

<script>
  export default {
    name: 'ShopNearbyList',
    props: {
      nearbyShops: {type: Array, required: true},
    },
  }
</script>
