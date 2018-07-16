@extends('layouts.base')

@section('body')
  <h1 class="h1">店舗詳細</h1>
  <el-card :body-style="{padding:'10px'}">
    <div slot="header" class="clearfix header">
      <h2 class="h5">{{$shop->name}}</h2>
    </div>
    <app-shop-detail :shop="{{$shop}}"></app-shop-detail>
  </el-card>
@endsection