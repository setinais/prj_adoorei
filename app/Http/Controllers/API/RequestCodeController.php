<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RequestCodeController extends Controller
{
    public static function getCodeApiClient($code)
    {
        $response = Http::timeout(60)->get('https://proxyapp.correios.com.br/v1/sro-rastro/'.$code);

        if($response->failed())
            return response()->json(['message' => 'Falha de conexão com servidor!'], 500);

        return json_decode($response->body(), true);
    }
}
