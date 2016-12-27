<?php

namespace App\Http\Controllers;

use App\Models\UnidadeProduto;
use App\Http\Requests\UnidadeProdutoRequest;

class UnidadeProdutoController extends Controller
{
    private $name = 'Unidade de Produto';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = UnidadeProduto::all();
        if (count($Data)) {
            return response()->success($Data);
        }
        return response()->error(trans('messages.crud.FAE', ['name' => $this->name]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UnidadeProdutoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadeProdutoRequest $request)
    {
        try {
            $data = $request->all();
            $Data = UnidadeProduto::create($data);
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
        $Data = UnidadeProduto::find($id);
        if (count($Data)) {
            return response()->success($Data);
        } else {
            return response()->error(trans('messages.crud.FGE', ['name' => $this->name]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UnidadeProdutoRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnidadeProdutoRequest $request, $id)
    {
        $Data = UnidadeProduto::find($id);
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
        $Data = UnidadeProduto::find($id);
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
