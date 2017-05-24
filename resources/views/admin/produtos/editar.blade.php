@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Produto</h2>
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	<div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admin.produtos')}}" class="breadcrumb">Lista de Produtos</a>
			        <a class="breadcrumb">Editar Produto</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.produtos.salvar', ['id' => $registro->id]) }}" method="post" enctype="multipart/form-data">

		{{csrf_field()}}
		@include('admin.produtos._form')

		<button class="btn blue" type="submit">Editar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection