<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller
{
    
    
    public function index(Request $request) {
        
        $erro = '';

        if($request->get('erro') == 1) {
            $erro = 'Usuario e ou senha não existe.';
        }

        if($request->get('erro') == 2) {
            $erro = 'Necessario realizar login para ter acesso a pagina ';
        }
        
        return view('site.login', ['titulo'=>'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuario é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio',
        ];

        //se nao passar pelo validate
        $request->validate($regras, $feedback);

        
        //recuperand os parametros do usuario
        $email = $request->get('usuario');
        $password = $request->get('senha');

       //iniciar o Model user
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        
        //iniciando a super global session e atribuindo o usuario a ela
        if(isset($usuario->name)) {
           
            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}