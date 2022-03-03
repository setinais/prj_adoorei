<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\EventsCode;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EventsCode[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Code::order();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request['objetos']['0'];

        $code = new Code();
        $code->code = $input['codObjeto'];
        $code->modality = $input['modalidade'];
        $code->enable_self_declaration = $input['habilitaAutoDeclaracao'];
        $code->allow_import_tax = $input['permiteEncargoImportacao'];
        $code->enable_travel_postman = $input['habilitaPercorridaCarteiro'];
        $code->lock_object = $input['bloqueioObjeto'];
        $code->has_locker = $input['possuiLocker'];
        $code->enable_locker = $input['habilitaLocker'];

        if(Code::find($input['codObjeto']) !== null)
        {
            return response()->json(['mensagem' => 'Objeto já cadastrado!'], 422);
        }

        if(isset($input['mensagem']))
        {
            $code = $this->checkRequestCode($code, $input);
        }else{
            $code = $this->storeOrUpdateCodeWithEvents($code, $input);
        }
        return response()->json($code,200);
    }

    private function checkRequestCode(Code $code, $input)
    {
        switch ($input['mensagem'])
        {
            case 'SRO-019: Objeto inválido':
                $code = ['mensagem' => 'Código inválido'];
                break;
            case 'SRO-020: Objeto não encontrado na base de dados dos Correios.':
                $code = $this->storeCodeWithoutEvents($code);
                break;
        }
        return $code;
    }

    private function storeCodeWithoutEvents(Code $code)
    {
        $code->status = 'Aguardando Postagem';
        $code->save();

        return $code;
    }

    private function storeOrUpdateCodeWithEvents(Code $code, $input)
    {
        $events = $input['eventos'];

        $code->postcard_type = json_encode($input['tipoPostal']);
        $code->enable_crowdshipping = $input['habilitaCrowdshipping'];
        $code->status = $this->getStatusEvent($events[0]['descricao']);
        $code->save();
        $test = [];
        for($i = count($events)-1; $i >= 0; $i--)
        {
            if(count(EventsCode::where('code_id', $code->code)->where('date_create', $events[$i]['dtHrCriado'])->get()) == 0)
                $code->eventsCodes()->save(EventsCodeController::storeEventCode($events[$i]));
        }

        return $code;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request['objetos']['0'];

        $code = Code::find($id);
        $code = $this->storeOrUpdateCodeWithEvents($code, $input);

        return response()->json($code);
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

    private function getStatusEvent($status): string
    {
        switch ($status) {
            case 'Objeto postado':
                return 'Postado';
            case 'Objeto em trânsito - por favor aguarde':
                return 'Em trânsito';
            case 'Objeto saiu para entrega ao destinatário':
                return 'Saiu para Entrega';
            case 'Objeto entregue ao destinatário':
                return 'Entregue';
            case 'Objeto devolvido ao país de origem':
                return 'Devolvido';
            case strpos($status,'retirada'):
                return 'Retirada';
            default:
                return 'Em trânsito';
        }
    }
}
