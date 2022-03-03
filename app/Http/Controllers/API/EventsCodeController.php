<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EventsCode;
use Illuminate\Http\Request;

class EventsCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
