<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller
{
    //

    public function index(Request $req)
    {
        $data = [
        	"registros" => Produto::all()
        ];

        return response()->view("admin.produtos.index", $data);
    }

    public function adicionar(Request $req)
    {
        $data = [];
        return response()->view("admin.produtos.adicionar", $data);
    }

    public function editar($id, Request $req)
    {
        $data = [
        	"registro" => Produto::findOrFail($id)
        ];
        return response()->view("admin.produtos.editar", $data);
    }

    public function salvar(Request $req)
    {
    	$id = $req->input("id");

    	if(empty($id)) {
    		$model = new Produto();
    	} else {
    		$model = Produto::findOrFail($id);
    	}
		$model->fill($req->all());

    	$model->save();

        return redirect()->route("admin.produtos");
    }

    public function deletar($id)
    {
    	$model = Produto::findOrFail($id);
    	$model->delete();
        return redirect()->route("admin.produtos");
    }
}