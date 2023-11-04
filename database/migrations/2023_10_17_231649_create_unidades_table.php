<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade',5); //cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //ADD RELACIONAMENTO COM A TABELA PRODUTOS - 1 pra muitos, 
        Schema::table('produtos', function (Blueprint $table) { 
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        
        //ADD RELACIONAMENTO COM A TABELA PRODUTOS_DETALHES - 1 pra muitos
        Schema::table('produto_detalhes', function (Blueprint $table) { 
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //REMOVENDO RELACIONAMENTO COM A TABELA PRODUTO_DETALHES
        Schema::table('produto_detalhes', function (Blueprint $table) { 
            //remover a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign');//[table]_[coluna]_[foreign]

            //remover a coluna
            $table->dropColumn('unidade_id');
            
        });


        //REMOVENDO RELACIONAMENTO COM A TABELA PRODUTOS
        Schema::table('produtos', function (Blueprint $table) { 
            //remover a FK
            $table->dropForeign('produtos_unidade_id_foreign');//[table]_[coluna]_[foreign]

            //remover a coluna
            $table->dropColumn('unidade_id');

        });
        
        Schema::dropIfExists('unidades');
    }
}
