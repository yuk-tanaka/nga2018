<template>
  <el-tabs type="card" v-model="active">
    <el-tab-pane label="参加店舗一覧" name="list">
      <shop-list></shop-list>
    </el-tab-pane>
    <el-tab-pane label="タイムライン" name="timeline">
      <shop-time-line :searchable="active === 'timeline'"></shop-time-line>
    </el-tab-pane>
    <el-tab-pane label="全店MAP" name="map">
      todo
    </el-tab-pane>
  </el-tabs>
</template>

<script>
  import ShopList from './ShopList'
  import ShopTimeLine from './ShopTimeLine'

  export default {
    name: 'AppShop',
    components: {
      ShopList,
      ShopTimeLine
    },
    data: () => ({
      active: 'list',
    }),
  }
</script>
