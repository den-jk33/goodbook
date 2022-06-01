<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\JsonRpcClient;

class ActivityLog
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

        $rpc_client = new JsonRpcClient;
        $rpc_client->send(JsonRpcClient::METHOD_URI_SAVE,['url'=>request()->fullUrl(),"visit_at"=>date('Y-m-d H:i:s')]);

        return $next($request);
    }
}
