<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Ocorrencia;
use Illuminate\Http\Request;

class OcorrenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $ocorrencias = Ocorrencia::orderByDesc('id')->get();
        return view('admin.ocorrencias.index', [
            'ocorrencias' => $ocorrencias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request, Ocorrencia $ocorrencia)
    {
        if ($request->has('notification')) {
            auth()->user()->unreadNotifications->where('id', $request->notification)->markAsRead();
        }
        return view('admin.ocorrencias.show', [
            'ocorrencia' => $ocorrencia
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ocorrencia $ocorrencia)
    {
        if ($request->hasFile('relatorio')) {
            $ocorrencia->update([
                'status' => 1
            ]);

            $ocorrencia->relatorio()->create([
                'path' => $request->file('relatorio')->store('/ocorrencias/relatorios', 'public')
            ]);
        };
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocorrencia $ocorrencia)
    {
        $ocorrencia->fotos()->delete();
        $ocorrencia->relatorio()->delete();
        $ocorrencia->delete();

        return redirect()->back();
    }

    /**
     * porEstado - Retorna ocorrências por estado
     * @param Request $request
     */
    public function porEstado(Request $request)
    {
        $uf = $request->uf;
        $estado = Estado::where('uf', $uf)->firstOrFail();

        $ocorrencias = Ocorrencia::whereHas('cidade', function ($q) use ($estado) {
            return $q->where('estado_id', $estado->id);
        })->get();
        if(count($ocorrencias) === 0 ){
            abort(404);
        }
        return response()->json($ocorrencias);
    }

    public function searchTableList(Request  $request){
        $ocorrencias = Ocorrencia::where(function ($q) use ($request) {
            return $q->where('nome', 'LIKE', '%' . $request->search . '%')
                ->orWhere('id',   $request->search  );
        })->get();
        return view('admin.ocorrencias.includes.list', ['ocorrencias' => $ocorrencias])->render();
    }
}
