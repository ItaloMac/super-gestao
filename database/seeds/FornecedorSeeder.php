<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor =new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com';
        $fornecedor->save();

        
        //utilizando metodo create (atenção ao metodo fillable da classe)
        $fornecedor::create([
            'nome'=>'fornecedor 200',
            'site'=>'fornecedor200.com.br',
            'uf'=>'BA',
            'email'=>'forn200@gmail.com',
        ]);

        //utilizando insert
        DB::table('fornecedores')->insert([
            'nome'=>'fornecedor 300',
            'site'=>'fornecedor300.com.br',
            'uf'=>'PA',
            'email'=>'forn300@gmail.com',
        ]);
    }
}
