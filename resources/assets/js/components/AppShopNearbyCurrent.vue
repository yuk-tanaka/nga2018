<template>
  <div>
    <ul>
      <li>利用には位置情報サービスをONにする必要があります。</li>
      <li>GPSを利用しない場合、計測結果が実際の位置と大幅にずれる可能性があります。</li>
    </ul>
    <div class="text-center">
      <el-button type="primary" @click="get">
        <i class="fas fa-search"></i> 現在地から探す
      </el-button>
    </div>
    <div>

    </div>
  </div>
</template>

<script>
  export default {
    name: 'AppShopNearby',
    components: {},
    data: () => ({
      latitude: null,
      longitude: null,
      loading: false,
    }),
    created() {
    },
    methods: {
      //https://qiita.com/TakayaTkmr/items/95590c4f9f0729ac6c78
      get: function () {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
              //success
              (position) => {
                //データを変数にして整理（position.coords.latitude/longitudeが座標）
                let lat = position.coords.latitude;
                let lng = position.coords.longitude;
                alert('lat:' + lat + 'lng:' + lng);
              },
              //error
              (error) => {
                //エラー情報を配列として定義
                let errorInfo = [
                  "原因不明のエラーが発生しました…。",
                  "位置情報の取得が許可されませんでした…。",
                  "電波状況などで位置情報が取得できませんでした…。",
                  "位置情報の取得に時間がかかり過ぎてタイムアウトしました…。"
                ];
                //エラーコードを変数に代入（エラーコードはgetCurrentPositionの引数として受け取っている）
                let errorNo = error.code;
                //エラーメッセージに、先に定義したエラーコードと、エラー番号に対応した情報をalert表示させる
                let errorMessage = "[エラー番号: " + errorNo + "]\n" + errorInfo[errorNo];
                alert(errorMessage);
              }
          );
        }
        //非対応
        else {
          alert('お使いの端末では位置情報を取得できません。');
        }
      }
    }
  }
</script>
