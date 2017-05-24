@extends('layouts.app')

@section('content')
<div class="container">

  <h2 align="center">Área Principal</h2>
  <br>

  <div class="divider"></div>
  <h5 class="center">Vendas</h5>
  <div class="divider"></div>

  <div class="row">

    <div class="col s12 m6">
      <div class="divider"></div>
      <h5 align="center">Vendedor</h5>
      <select id="vendedores" class="">
        <option value="">Selecione um vendedor</option>
        @foreach($vendedores as $vendedor)
          <option value="{{$vendedor->id}}" data-comissao="{{$vendedor->comissao}}">{{$vendedor->nome}}</option>
        @endforeach
      </select>
    </div> 

    <div class="col s12 m6">
      <div class="divider"></div>
      <h5 align="center">Produto</h5>
      <select id="produtos" class="">
        <option value="">Selecione um produto</option>
        @foreach($produtos as $produto)
          <option value="{{$produto->id}}" data-valor="{{$produto->valor}}" data-quantidade="{{$produto->quantidade}}">{{$produto->nome}}</option>
        @endforeach
      </select>
    </div> 

  </div>

    <div class="row">
      <div class="col s12 m4" id="vendaWrapper">
        <div class="divider"></div>
        <h5 align="center">Realizar venda</h5>
      

        <form action="{{route('admin.venda')}}" method="POST">
          {!! csrf_field()  !!}
          <input type="hidden" name="produto" value=""/>
          <input type="hidden" name="vendedor" value=""/>

          <p><b>Quantidade: </b><span data-name="quantidade">0</span></p>
          <p><b>Valor: </b><span data-name="valor">0</span></p>
          <p><b>Comissão (%): </b><span data-name="comissao">0</span></p>
          <p><b>Valor da comissão: </b><span data-name="valor-comissao">0</span></p>

          <button type="submit" class="btn btn green">Vender</button>
        </form>
      </div>
    </div>

  </div>
</div>  

@endsection

@section('scripts')
  <script>
      $(function() {
        var $vendaWrapper = $("#vendaWrapper");
        var $vendedores = $("#vendedores");
        var $produtos = $("#produtos");

        $("#vendedores").on("change", function() {
          var id = $(this).val();

          $vendaWrapper.find("[name='vendedor']").val(id);
          atualizarValores();
        });

        $("#produtos").on("change", function() {
          var id = $(this).val();

          $vendaWrapper.find("[name='produto']").val(id);
          atualizarValores();
        });

        function atualizarValores() {
          var idVendedor = $vendaWrapper.find("[name='vendedor']").val();
          var idProduto = $vendaWrapper.find("[name='produto']").val();

          if(idVendedor && idProduto) {
            var $optVendedor = $vendedores.find("option:selected");
            var $optProduto = $produtos.find("option:selected");
            
            var valor = $optProduto.attr("data-valor");
            var comissao = $optVendedor.attr("data-comissao");

            $vendaWrapper.find("[data-name='quantidade']").text($optProduto.attr("data-quantidade"));
            $vendaWrapper.find("[data-name='valor']").text(valor);
            $vendaWrapper.find("[data-name='comissao']").text(comissao);
            $vendaWrapper.find("[data-name='valor-comissao']").text(parseFloat(valor) * parseFloat(comissao) / 100);
          }
        }
      });
  </script>
@endsection
