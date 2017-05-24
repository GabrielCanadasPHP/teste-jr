<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Vendedor;

class VendaController extends Controller
{
    //
    public function vender(Request $req) {
        $idProduto = $req->input("produto");
        $idVendedor = $req->input("vendedor");

        $vendedor = Vendedor::findOrFail($idVendedor);
        $produto = Produto::findOrFail($idProduto);

        $produto->quantidade = $produto->quantidade - 1;

        $produto->save();
        $vendedor->produtosVendidos()->attach($idProduto, ["comissaoRecebida" => $produto->valor * $vendedor->comissao / 100]);

        return redirect()->route("admin.principal");
    }

}