<template>
  <el-tabs v-model="active">
    <el-tab-pane label="参加店舗一覧" name="list">
      <shop-list></shop-list>
    </el-tab-pane>
    <el-tab-pane label="タイムライン" name="timeline">
      <shop-time-line :searchable="active === 'timeline'"></shop-time-line>
    </el-tab-pane>
    <el-tab-pane label="全店MAP" name="map">
      <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.1066533760754!2d135.4937619155119!3d34.70248979062943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68d95e3a70b%3A0x1baec822e859c84a!2z5aSn6Ziq6aeF!5e0!3m2!1sja!2sjp!4v1531726036659"
          width="100%"
          height="500"
          frameborder="1"
          style="border:0"
          allowfullscreen>
      </iframe>
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
