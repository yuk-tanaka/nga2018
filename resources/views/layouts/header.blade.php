<b-navbar toggleable="md" type="dark" variant="navbar">

  <b-navbar-brand href="{{route('index')}}">日本酒ゴーアラウンド非公式</b-navbar-brand>

  <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

  <b-collapse is-nav id="nav_collapse">
    <b-navbar-nav>
      <b-nav-item href="{{route('shops')}}" :active="true">店舗一覧</b-nav-item>
      <b-nav-item href="{{route('favorites')}}" :active="true">チェックリスト</b-nav-item>
      <b-nav-item href="{{route('nearby')}}" :active="true">近い店を探す</b-nav-item>
    </b-navbar-nav>
    <b-navbar-nav class="ml-auto">
      <b-nav-item href="//twitter.com/achel_b8" target="_blank" right><i class="fab fa-twitter"></i>
      </b-nav-item>
      <b-nav-item href="" target="_blank" right><i class="fab fa-github"></i></b-nav-item>
    </b-navbar-nav>
  </b-collapse>
</b-navbar>