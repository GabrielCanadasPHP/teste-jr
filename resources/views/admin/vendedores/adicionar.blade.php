@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Vendedor</h2>
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	<div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admin.vendedores')}}" class="breadcrumb">Lista de Vendedores</a>
			        <a class="breadcrumb">Adicionar Vendedor</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.vendedores.salvar') }}" method="post" enctype="multipart/form-data">

		{{csrf_field()}}
		@include('admin.vendedores._form')

		<button type="submit" class="btn blue">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection