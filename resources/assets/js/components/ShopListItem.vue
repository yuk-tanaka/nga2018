<template>
  <div class="box-card">
    <el-card>
      <div slot="header" class="clearfix">
        <b-row>
          <b-col cols="9">
            <el-tag class="tag" type="success" size="mini">{{shop.area.name}}</el-tag>
            <div class="shop-name">
              <h3 class="h5">
                <a :href="shop.show_url"><b>{{shop.name}}</b></a>
                <template v-if="shop.twitter">
                  <a :href="shop.twitter" target="_blank"><i class="fab fa-twitter-square"></i></a>
                </template>
                <template v-if="shop.facebook">
                  <a :href="shop.facebook" target="_blank"><i class="fab fa-facebook-square"></i></a>
                </template>
                <template v-if="shop.web">
                  <a :href="shop.web" target="_blank"><i class="fas fa-home"></i></a>
                </template>
                <template v-if="shop.tabelog">
                  <a :href="shop.tabelog" target="_blank"><i class="fas fa-utensils"></i></a>
                </template>
              </h3>
            </div>
          </b-col>
          <b-col cols="3" class="text-center">
            <shop-favorite-icon :shop-id="shop.id"></shop-favorite-icon>
          </b-col>
        </b-row>
      </div>

      <div class="list">
        <dl>
          <dt><i class="fas fa-glass-martini"></i></dt>
          <dd>
            <b>{{shop.brewery.prefecture}}・{{shop.brewery.name}}</b>
            <span>（{{shop.brewery.company_name}}）</span>
            <template v-if="shop.brewery.twitter">
              <a :href="shop.brewery.twitter" target="_blank"><i class="fab fa-twitter-square"></i></a>
            </template>
            <template v-if="shop.brewery.facebook">
              <a :href="shop.brewery.facebook" target="_blank"><i class="fab fa-facebook-square"></i></a>
            </template>
            <template v-if="shop.brewery.web">
              <a :href="shop.brewery.web" target="_blank"><i class="fas fa-home"></i></a>
            </template>
          </dd>
        </dl>
        <dl>
          <dt><i class="fas fa-clock"></i></dt>
          <dd>{{shop.business_hours}}</dd>
        </dl>
        <dl>
          <dt><i class="fas fa-map-marker-alt"></i></dt>
          <dd><a :href="shop.gmap_url" target="_blank">{{shop.address}}</a></dd>
        </dl>
      </div>
      <shop-detail-dialog :shop="shop"></shop-detail-dialog>

    </el-card>
  </div>
</template>

<style scoped>
  .box-card {
    padding-bottom: 10px;
  }

  .tag {
    margin-bottom: 5px;
  }

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
  import ShopDetailDialog from './ShopDetailDialog';
  import ShopFavoriteIcon from './ShopFavoriteIcon';

  export default {
    name: 'ShopListItem',
    components: {
      ShopDetailDialog,
      ShopFavoriteIcon
    },
    props: {
      shop: {type: Object, required: true},
    },
  }
</script>
