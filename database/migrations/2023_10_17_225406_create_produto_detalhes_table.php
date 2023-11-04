<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id'); //coluna que recebe o id da tabela produtos.
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            //constraint de relacionamento com a tabela produtos.
            $table->foreign('produto_id')->references('id')->on('produtos');//a coluna produto_id recebe o id da tabela produtos
            $table->unique('produto_id');//garante o relacionamento 1 pra 1, sem o 'unique' o relacionamento seria 1 pra n, onde um produto_detalhes recebe mais de um produto.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
