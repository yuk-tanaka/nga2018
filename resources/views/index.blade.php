@extends('layouts.base')

@section('title')
  日本酒ゴーアラウンド非公式ポータル
@endsection

@section('body')
  <h1 class="h2">日本酒ゴーアラウンド非公式ポータル</h1>

  <div>
    ゴーアラウンドの画像を貼る
    {{--<img src="//livedoor.blogimg.jp/manjigatame3/imgs/1/1/11286788.jpg" height="400">--}}
  </div>
  <h2 class="h4"></h2>
  <p>
    ゴーアラウンドの概要をかく
  </p>
  <p>
    まだ実データ入れてません
  </p>
  <p>
    ちゃんとした情報は公式見てね
  </p>
  <a href="{{route('shops')}}" class="el-button el-button--primary el-button--mini">店舗一覧</a>
  <a href="{{route('favorites')}}" class="el-button el-button--primary el-button--mini">チェックリスト</a>
  <a href="{{route('nearby')}}" class="el-button el-button--primary el-button--mini">近い店を探す</a>
  <hr>
  <h2 class="h4">Q&A</h2>
  <dl>
    <dt>完成度？</dt>
    <dd>まだこれから</dd>
  </dl>
@endsection