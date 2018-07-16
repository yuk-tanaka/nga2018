<template>
  <div>
    <shop-search-bar
        @search="search">
    </shop-search-bar>
    <b-row v-loading="loading">
      <template v-if="shops.length">
        <b-col xs="12" sm="6" md="6" lg="4" class="center-block" v-for="shop in shops" :key="shop.id">
          <shop-list-item :shop="shop"></shop-list-item>
        </b-col>
      </template>
      <template v-else-if="!loading">
        <b-col cols="12">
          <p>店舗情報がありません。絞り込み条件を変更してください。</p>
        </b-col>
      </template>
      <template v-else>
        <b-col cols="12">
          <p>読み込み中…</p>
        </b-col>
      </template>
    </b-row>
  </div>
</template>

<script>
  import ShopListItem from './ShopListItem';
  import ShopSearchBar from "./ShopSerachBar";

  export default {
    name: 'ShopList',
    components: {
      ShopSearchBar,
      ShopListItem,
    },
    props: {
      favorites: {type: Array, default: null},
    },
    data: () => ({
      shops: [],
      loading: true,
    }),
    mounted() {
      this.search(null, null);
    },
    methods: {
      search: function (cities, areas) {
        const url = process.env.MIX_APP_URL + '/api/shops';
        this.$set(this, 'loading', true);
        axios.get(url, {
          params: {favorites: this.favorites, cities: cities, areas: areas}
        }).then(response => {
          this.$set(this, 'shops', response.data.data);
          this.$set(this, 'loading', false);
        });
      }
    }
  }
</script>
