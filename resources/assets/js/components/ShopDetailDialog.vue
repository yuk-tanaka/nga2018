<template>
  <div>
    <div class="text-center">
      <el-button type="primary" size="small" @click="dialogTableVisible = true">
        店舗詳細
      </el-button>
    </div>
    <el-dialog width="90%"
               :title="shop.name"
               :visible.sync="dialogTableVisible">
      <app-shop-detail :shop="shop" :fetchable.sync="dialogTableVisible"></app-shop-detail>
    </el-dialog>
  </div>
</template>

<style scoped>
</style>

<script>
  import AppShopDetail from './AppShopDetail';
  import ShopNearbyList from './ShopNearbyList';

  export default {
    name: 'ShopDetailDialog',
    components: {
      AppShopDetail,
      ShopNearbyList,
    },
    props: {
      shop: {type: Object, required: true},
    },
    data: () => ({
      dialogTableVisible: false,
    }),
    mounted() {
    },
    methods: {}
  }
</script>
