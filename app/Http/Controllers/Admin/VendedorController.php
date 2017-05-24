<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vendedor;

class VendedorController extends Controller
{
    public function index(Request $req)
    {
    	$data = [
        	"registros" => Vendedor::all()
        ];

        return response()->view("admin.vendedores.index", $data);
    }

        public function adicionar(Request $req)
    {
        $data = [];
        return response()->view("admin.vendedores.adicionar", $data);
    }

    public function editar($id, Request $req)
    {
        $data = [
        	"registro" => Vendedor::findOrFail($id)
        ];
        return response()->view("admin.vendedores.editar", $data);
    }

    public function salvar(Request $req)
    {
    	$id = $req->input("id");

    	if(empty($id)) {
    		$model = new Vendedor();
    	} else {
    		$model = Vendedor::findOrFail($id);
    	}
		$model->fill($req->all());

    	$model->save();

        return redirect()->route("admin.vendedores");
    }

    public function deletar($id)
    {
    	$model = Vendedor::findOrFail($id);
    	$model->delete();
        return redirect()->route("admin.vendedores");
    }
}
