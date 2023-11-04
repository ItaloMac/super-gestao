<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //request - manipular
       // return $next($request);

       //definição de variavel
        $ip= $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        
        //registro no banco de dados
        LogAcesso::create(['log'=>"IP $ip requisitou a rota $rota"]);
        
        //empurrar a solicitação pra frente
        return $next($request);
    }
}
