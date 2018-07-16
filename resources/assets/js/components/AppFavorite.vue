<template>
  <el-tabs v-model="active">
    <el-tab-pane label="チェックリスト" name="list">
      <shop-list :favorites="favorites"></shop-list>
    </el-tab-pane>
    <el-tab-pane label="タイムライン" name="timeline">
      <shop-time-line></shop-time-line>
    </el-tab-pane>
  </el-tabs>
</template>

<script>
  import ShopList from './ShopList'
  import ShopTimeLine from './ShopTimeLine'

  export default {
    name: 'AppFavorite',
    components: {
      ShopList,
      ShopTimeLine
    },
    data: () => ({
      active: 'list',
      favorites: [],
    }),
    created() {
      const favorites = Object.keys(localStorage).map((val) => {
        //shopIdがstringで保存されているためint変換
        return parseInt(val);
      }).filter((val) => {
        //laravel-debugbarがlocalStorageを使用しているため、配列内にNaNが含まれる
        return !isNaN(val);
      });

      this.$set(this, 'favorites', favorites);
    },
  }
</script>
