<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        
        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        */

        //print_r($contato->getAttributes());
        //$contato->save();

        //$contato = new SiteContato();
        //$contato->fill($request->all());
        //$contato->save();

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['titulo' =>'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
       
       //Realizar a validação dos dados do formulário recebidos no request
       $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
       ]);

       //Alterando as mensagens de erro
       [
            'nome.required' => 'O campo precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já esta em uso',

            'required' => 'O campo precisa ser preenchido',
       ];
        // $contato = new SiteContato();
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
