<template>
  <span>
    <template v-if="this.isChecked">
      <el-tooltip content="チェックリストから削除" placement="bottom">
        <el-button type="text" icon="el-icon-star-on" @click="remove()"></el-button>
      </el-tooltip>
    </template>
    <template v-else>
      <el-tooltip content="チェックリストに登録" placement="bottom">
        <el-button type="text" icon="el-icon-star-off" @click="check()"></el-button>
      </el-tooltip>
    </template>
  </span>
</template>

<script>
  export default {
    name: 'ShopFavoriteIcon',
    props: {
      shopId: {type: Number, required: true},
    },
    data: () => ({
      isChecked: false,
    }),
    mounted() {
      //localStorageは強制string型のため要型変換
      const isSaved = Object.keys(localStorage).find((val) => {
        return parseInt(val) === this.shopId;
      });
      if (isSaved) {
        this.$set(this, 'isChecked', true);
      }
    },
    methods: {
      //localStorageのkeyにshopIdを指定してお気に入りを登録する
      check: function () {
        this.$set(this, 'isChecked', true);
        localStorage.setItem(this.shopId, 'true');
      },
      //お気に入りから削除
      remove: function () {
        this.$set(this, 'isChecked', false);
        localStorage.removeItem(this.shopId);
      },
    }
  }
</script>
