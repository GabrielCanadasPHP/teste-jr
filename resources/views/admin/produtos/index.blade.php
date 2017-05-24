@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Produtos</h2>

		<div class="row">
			<nav>
				<div class="nav-wrapper green">
					<div class="col s12">
						<a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
						<a class="breadcrumb">Lista de Produtos</a>
					</div>
				</div>
			</nav>
		</div>


		<div class="row">
			<table class="bordered highlight centered responsive-table">
				<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Valor</th>
					<th>Quantidade</th>
					<th>Ação</th>
				</tr>
				</thead>
				<tbody>
				@foreach($registros as $i => $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->nome }}</td>
						<td>R$ {{ number_format ((float)$registro->valor,2,",",".") }}</td>
                        <td>{{ $registro->quantidade }}</td>
						<td data-id="{{ $registro->id }}">
							<a class="btn orange edit" href="#">Editar</a>
							<a class="btn red del" href="#">Deletar</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>
		<div class="row">
                <a class="waves-effect waves-light btn blue" href="{{route('admin.produtos.adicionar')}}"><i class="material-icons left">add_circle_outline</i>Adicionar</a>
		</div>
	</div>

@endsection


@section('scripts')
	<script>
        $( document ).ready(function() {
            $('tbody').on('click', '.del', function(){
                var registroId = $(this).parent().attr('data-id');

                swal({
                    title: 'Tem certeza?',
                    text: "Seu registro será deletado!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, deletar!',
                    cancelButtonText: 'Não, cancelar!'
                }).then(function (){
                    location.href='/admin/produtos/deletar/'+registroId;
					{{--location.replace("{{ route('admin.produtos.deletar', registroId) }}")--}}
                }, function (dismiss){
                    if (dismiss === 'cancel') {
                        swal(
                            'Cancelado',
                            'Seu registro não será deletado',
                            'error'
                        );
                    }
                });
            });

            $('tbody').on('click', '.edit', function()
            {
                var registroId = $(this).parent().attr('data-id');

                swal
                ({
                    title: 'Tem certeza?',
                    text: "Você será redirecionado para a tela de edição",
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!',
                    cancelButtonText: 'Não, cancelar!'
                }).then(function ()
                {
                    location.href='/admin/produtos/editar/'+registroId;
					{{--location.replace("{{ route('admin.produtos.editar',registroId) }}")--}}
                }, function (dismiss)
                {
                    if (dismiss === 'cancel') {
                        swal
                        (
                            'Cancelado',
                            'Seu registro não será atualizado',
                            'info'
                        );
                    }
                });
            });
        });
	</script>
@endsection
