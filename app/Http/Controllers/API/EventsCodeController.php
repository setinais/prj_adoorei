<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EventsCode;
use Illuminate\Http\Request;

class EventsCodeController extends Controller
{

    public static function storeEventCode($events): EventsCode
    {
        $event_code = new EventsCode();
        $event_code->code_event = $events['codigo'];
        $event_code->description = $events['descricao'];
        $event_code->date_create = $events['dtHrCriado'];
        $event_code->type = $events['tipo'];
        $event_code->unity = json_encode($events['unidade']);
        $event_code->unity_type = $events['unidade']['tipo'];
        if(isset($events['unidade']['nome']))
            $event_code->unity_coutry = $events['unidade']['nome'];

        return $event_code;
    }
}
