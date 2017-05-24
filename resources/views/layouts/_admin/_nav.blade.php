@if(Auth::user())
<div class="container">
        <ul id="slide-out" class="side-nav fixed" style>
          <li>
            <div class="userView">
              <div class="background">
                <img src="{{ asset('img/backgroundNav.jpg') }}">
              </div>

              <div align="center">
                <a href="{{ route('admin.principal') }}"><img class="circle" align="center" src="{{ asset (Auth::user()->imagem) }}"></a>
                <span class="white-text">{{ Auth::user()->name }}</span>
                <span class="white-text">{{ Auth::user()->email }}</span>
              </div>

            </div>

          <li><a class="waves-effect" href="{{route('admin.vendedores')}}">
          <!-- <i class="material-icons blue-text">my_location</i> -->
          Vendedores</a></li>

          <li><a class="waves-effect" href="{{route('admin.produtos')}}">
          <!-- <i class="material-icons blue-text">view_carousel</i> -->
          Produtos</a></li>

          <li><div class="divider"></div></li>
          
          <li><a class="waves-effect" id="sairSistema" href="{{ route('admin.login.sair') }}"><i class="material-icons blue-text">exit_to_app</i>Sair</a></li>
        </ul>
</div>
@endif
