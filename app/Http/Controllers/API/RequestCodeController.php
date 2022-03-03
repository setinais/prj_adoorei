<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class RequestCodeController extends Controller
{
    public static function getCodeApiClient($code)
    {
        $response = Http::timeout(60)->get('https://proxyapp.correios.com.br/v1/sro-rastro/'.$code);

        if($response->failed())
            return response()->json(['message' => 'Falha de conexão com servidor!'], 500);

        return json_decode($response->body(), true);
    }

    public function updateAllCodes()
    {
        try {
            $codes = Code::all();
            $codeController = new CodeController();
            foreach ($codes as $code)
            {
                $requestCodeApi = RequestCodeController::getCodeApiClient($code->code);
                $input = $requestCodeApi['objetos'][0];
                $codeController->update($code, $input);
            }
            return response()->json(['message' => 'Atualizado com sucesso'], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Erro Interno, contate o Administrador!'], 500);
        }
    }
}
