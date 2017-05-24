<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
	protected $table = "vendedores";

	protected $fillable = ["nome", "comissao", "email"];

	public function produtosVendidos() {
		return $this->belongsToMany("App\\Produto", "a_produto_vendedor_venda", "idVendedor", "idProduto");
	}
}
