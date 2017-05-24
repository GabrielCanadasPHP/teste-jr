<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssociativaProdutoVendedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_produto_vendedor_venda', function (Blueprint $table) {
            $table->integer("idProduto")->unsigned();
            $table->integer("idVendedor")->unsigned();
            $table->foreign('idProduto')->references('id')->on('produtos');
            $table->foreign('idVendedor')->references('id')->on('vendedores');
            $table->float("comissaoRecebida");
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop("a_produto_vendedor_venda");
    }
}
