<template>
  <div>
    <!--店舗-->
    <div>
      <h3 class="h5"><i class="fas fa-store"></i> 店舗情報</h3>
      <dl>
        <dt><i class="fas fa-clock"></i> 営業時間</dt>
        <dd>{{shop.business_hours}}</dd>
        <dt><i class="fas fa-map-marker-alt"></i> 住所</dt>
        <dd><a :href="shop.gmap_url" target="_blank">{{shop.address}}</a></dd>
        <template v-if="shop.twitter">
          <dt><i class="fab fa-twitter-square"></i> twitter</dt>
          <dd><a :href="shop.twitter">{{shop.twitter}}</a></dd>
        </template>
        <template v-if="shop.facebook">
          <dt><i class="fab fa-facebook-square"></i> facebook</dt>
          <dd><a :href="shop.facebook">{{shop.facebook}}</a></dd>
        </template>
        <template v-if="shop.web">
          <dt><i class="fas fa-home"></i> webページ</dt>
          <dd><a :href="shop.web">{{shop.web}}</a></dd>
        </template>
        <template v-if="shop.tabelog">
          <dt><i class="fas fa-utensils"></i> 食べログ</dt>
          <dd><a :href="shop.tabelog">{{shop.tabelog}}</a></dd>
        </template>
      </dl>
    </div>
    <!--酒蔵-->
    <div>
      <h3 class="h5"><i class="fas fa-glass-martini"></i> 酒蔵情報</h3>
      <dl>
        <dt><i class="fas fa-clock"></i> 名称</dt>
        <dd>{{shop.brewery.name}}（{{shop.brewery.company_name}}）</dd>
        <dt><i class="fas fa-map-marker-alt"></i> 都道府県</dt>
        <dd>{{shop.brewery.prefecture}}</dd>
        <template v-if="shop.brewery.twitter">
          <dt><i class="fab fa-twitter-square"></i> twitter</dt>
          <dd><a :href="shop.brewery.twitter">{{shop.brewery.twitter}}</a></dd>
        </template>
        <template v-if="shop.brewery.facebook">
          <dt><i class="fab fa-facebook-square"></i> facebook</dt>
          <dd><a :href="shop.brewery.facebook">{{shop.brewery.facebook}}</a></dd>
        </template>
        <template v-if="shop.brewery.web">
          <dt><i class="fas fa-home"></i> webページ</dt>
          <dd><a :href="shop.brewery.web">{{shop.brewery.web}}</a></dd>
        </template>
      </dl>
    </div>
    <!--近隣店舗-->
    <div>
      <h3 class="h5"><i class="fas fa-location-arrow"></i> 近隣の店舗情報</h3>
      <shop-nearby :nearby-shops="nearbyShops"></shop-nearby>
    </div>
  </div>
</template>

<script>
  import ShopNearby from './ShopNearby';

  export default {
    name: 'AppShopDetail',
    components: {
      ShopNearby,
    },
    props: {
      fetchable: {type: Boolean},
      shop: {type: Object, required: true},
    },
    data: () => ({
      nearbyShops: [],
    }),
    mounted() {
      const url = process.env.MIX_APP_URL + '/api/shops/' + this.shop.id + '/nearby';
      axios.get(url).then(response => {
        this.$set(this, 'nearbyShops', response.data.data);
      });
    },
  }
</script>