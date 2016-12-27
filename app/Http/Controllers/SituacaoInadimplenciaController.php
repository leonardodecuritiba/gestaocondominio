<?php

namespace App\Http\Controllers;

use App\Http\Requests\SituacaoInadimplenciaRequest;
use App\Models\SituacaoInadimplencia;

class SituacaoInadimplenciaController extends Controller
{
    private $name = 'Situação de Inadimplência';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = SituacaoInadimplencia::all();
        if (count($Data)) {
            return response()->success($Data);
        }
        return response()->error(trans('messages.crud.FAE', ['name' => $this->name]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SituacaoInadimplenciaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SituacaoInadimplenciaRequest $request)
    {
        try {
            $data = $request->all();
            $Data = SituacaoInadimplencia::create($data);
        } catch (Exception $e) {
            return response()->error($e->getMessage);
        }
        return response()->success(trans('messages.crud.FSS', ['name' => $this->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Data = SituacaoInadimplencia::find($id);
        if (count($Data)) {
            return response()->success($Data);
        } else {
            return response()->error(trans('messages.crud.FGE', ['name' => $this->name]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SituacaoInadimplenciaRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SituacaoInadimplenciaRequest $request, $id)
    {
        $Data = SituacaoInadimplencia::find($id);
        if (count($Data)) {
            try {
                $data = $request->all();
                $Data->update($data);
            } catch (Exception $e) {
                return response()->error($e->getMessage);
            }
            return response()->success(trans('messages.crud.FUS', ['name' => $this->name]));
        } else {
            return response()->error(trans('messages.crud.FGE', ['name' => $this->name]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Data = SituacaoInadimplencia::find($id);
        if (count($Data)) {
            try {
                $Data->delete();
            } catch (Exception $e) {
                return response()->error($e->getMessage);
            }
            return response()->success(trans('messages.crud.FDS', ['name' => $this->name]));
        } else {
            return response()->error(trans('messages.crud.FGE', ['name' => $this->name]));
        }

    }
}
