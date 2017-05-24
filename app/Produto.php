<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	protected $table = "produtos";
    protected $fillable = ["nome", "valor", "quantidade"];

	public function vendidoPor() {
		return $this->belongsToMany("App\\Vendedor", "a_produto_vendedor_venda", "idProduto", "idVendedor");
	}
}
