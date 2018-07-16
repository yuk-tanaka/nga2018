<template>
  <div class="box-card">
    <el-card :body-style="{padding:'10px'}">
      <div slot="header" class="clearfix header">
        <h2 class="h5">開催都市・エリアで絞り込み
          <el-tooltip content="条件を指定しない場合、すべての店舗を表示します。" placement="top">
            <i class="el-icon-question"></i>
          </el-tooltip>
        </h2>
      </div>
      <!--city-->
      <div class="city">
        <el-checkbox-group v-model="checkedCities">
          <el-checkbox-button v-for="city in cities"
                              :label="city.id"
                              :key="city.id">
            {{city.name}}
          </el-checkbox-button>
        </el-checkbox-group>
      </div>
      <!--area-->
      <div class="area">
        <el-checkbox-group v-model="checkedAreas" size="mini">
          <el-checkbox v-for="area in areas"
                       :label="area.id"
                       :key="area.id"
                       border>
            {{area.name}}
          </el-checkbox>
        </el-checkbox-group>
      </div>
    </el-card>
  </div>
</template>

<style scoped>
  .box-card {
    padding-bottom: 10px;
  }
</style>

<script>
  export default {
    name: 'ShopSearchBar',
    data: () => ({
      actives: ['search'],
      cities: [],
      checkedCities: [],
      checkedAreas: [],
    }),
    computed: {
      areas: function () {
        //cities全選択解除時、areasの選択も解除
        //TODO 別メソッドに分割
        if (!this.checkedCities.length) {
          this.$set(this, 'checkedAreas', []);
        }

        const checked = this.cities.filter((city) => {
          return this.checkedCities.find((id) => {
            return id === city.id;
          });
        });

        let areas = [];

        checked.forEach((city) => {
          city.areas.forEach((area) => {
            areas.push(area);
          });
        });

        return areas;
      }
    },
    watch: {
      checkedCities: function (cities) {
        this.$emit('search', cities, this.checkedAreas);
      },
      checkedAreas: function (areas) {
        this.$emit('search', this.checkedCities, areas);
      },
    },
    created() {
      const url = './api/cities';
      axios.get(url).then(response => {
        this.cities = response.data.data;
      });
    },
  }
</script>
