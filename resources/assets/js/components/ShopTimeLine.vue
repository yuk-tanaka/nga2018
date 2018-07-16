<template>
  <div>
    todo 都市絞り込み
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
      searchable: {type: Boolean, default: false},
    },
    data: () => ({
      header: ['地域', '店舗', '開店時間', '閉店時間'],
      shops: [],
      options: {
        height: 800,
      },
      events: {
        select: () => {
        },
      }
    }),
    watch: {
      searchable: function (searchable) {
        if (searchable) {
          this.search(null, null);
        } else {
          this.$set(this, 'shops', []);
        }
      }
    },
    methods: {
      search: function (cities, areas) {
        const url = process.env.MIX_APP_URL + '/api/shops';
        axios.get(url, {
          params: {favorites: this.favorites, cities: cities, areas: areas}
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
