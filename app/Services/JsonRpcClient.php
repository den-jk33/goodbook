<?php

namespace App\Services;

use App\Activity;
use App\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class JsonRpcClient
{

    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'data';
    const METHOD_URI_SAVE = 'save';
    const METHOD_URI_LIST = 'list';


    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json','Authorization' => 'Bearer '. config("services.activity.api_token")],
            'base_uri' => config('services.activity.base_uri')
        ]);
    }


    public function send(string $method, array $params=null)
    {
        $post_fields[RequestOptions::JSON] = [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'id' => time(),
            'method' => $method,
            'params' => $params
        ];
        $response = $this->client->request('POST', self::METHOD_URI,$post_fields)->getBody()->getContents();
        return json_decode($response, true);
    }



    public function getList($params=null)
    {
        $result = $this->send(JsonRpcClient::METHOD_URI_LIST,$params);
        if(!empty($result['result'])) return $result['result'];
        return null;
    }



}
