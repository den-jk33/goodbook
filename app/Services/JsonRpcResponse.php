<?php

namespace App\Services;

use App\Activity;
use App\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class JsonRpcResponse
{
    const JSON_RPC_VERSION = '2.0';

    public static function success($result, string $id = null)
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'result'  => $result,
            'id'      => $id,
        ];
    }

    public static function error($error)
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'error'  => $error,
            'id'      => null,
        ];
    }
}
