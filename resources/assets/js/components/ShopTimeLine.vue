<template>
  <div>
    <el-checkbox-group v-model="checkedCities">
      <el-checkbox-button v-for="city in cities"
                          :label="city.id"
                          :key="city.id">
        {{city.name}}
      </el-checkbox-button>
    </el-checkbox-group>
    <GChart
        v-if="shops.length"
        :settings="{ packages: ['timeline'] }"
        type="Timeline"
        :data="shops"
        :options="options"
        :events="events"
    />
    <p v-else>読み込み中…</p>
  </div>
</template>

<script>
  import {GChart} from 'vue-google-charts'

  export default {
    name: 'ShopTimeLine',
    components: {
      GChart
    },
    props: {
      favorites: {type: Array, default: null},
      searchable: {type: Boolean, default: false},
    },
    data: () => ({
      cities: null,
      checkedCities: [],
      header: ['地域', '店舗', '開店時間', '閉店時間'],
      shops: [],
      options: {
        height: 600,
      },
      events: {
        select: () => {
        },
      }
    }),
    watch: {
      checkedCities: function (cities) {
        this.$set(this, 'shops', []);
        this.search(cities);
      },
      //タブ隠れている状態だとスタイルが崩れるので、タブ呼び出しごとに再描写する
      searchable: function (searchable) {
        if (searchable) {
          this.search(null);
        } else {
          this.$set(this, 'checkedCities', []);
          this.$set(this, 'shops', []);
        }
      }
    },
    created() {
      const url = process.env.MIX_APP_URL + '/api/cities';
      axios.get(url).then(response => {
        this.cities = response.data.data;
      });
    },
    methods: {
      search: function (cities) {
        const url = process.env.MIX_APP_URL + '/api/shops';
        axios.get(url, {
          params: {favorites: this.favorites, cities: cities}
        }).then(response => {
          //g-chart timelineに整形
          this.shops.push(this.header);
          response.data.data.forEach((shop) => {
            this.shops.push([
              shop.area.name,
              shop.name,
              new Date(2018, 10, 1, shop.opened_at_hour, shop.opened_at_min),
              new Date(2018, 10, 1, shop.closed_at_hour, shop.closed_at_min),
            ]);
          });
        });
      }
    }
  }
</script>
