<?php
namespace App\Services;

use App\Activity;
use App\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Services;
use App\Http\Controllers\ActivityController;

class JsonRpcServer
{

    public function handle(Request $request, ActivityController $controller) {

        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                //throw new JsonRpcException('Parse error', JsonRpcException::PARSE_ERROR);
            }
            $result = $controller->{$content['method']}(...[$content['params']]);

            return JsonRpcResponse::success($result, $content['id']);
        } catch (\Exception $e) {
            return JsonRpcResponse::error($e->getMessage());
        }

    }


}
