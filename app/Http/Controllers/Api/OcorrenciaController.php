<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOcorrenciaRequest;
use App\Http\Resources\OcorrenciaResource;
use App\Models\Cavalo;
use App\Models\Ocorrencia;
use App\Models\OcorrenciaFoto;
use App\Models\User;
use App\Notifications\NovaOcorrencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return OcorrenciaResource::collection(auth()->user()->ocorrencias);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreOcorrenciaRequest $request)
    {
        DB::beginTransaction();

        $cavalo = Cavalo::create($request->only(['apelido', 'sexo', 'idade','cavalo_raca_id']));

        $ocorrencia = new OcorrenciaResource(
            auth('api')->user()->ocorrencias()->create(
                $request->merge(['cavalo_id' => $cavalo->id,'status'=>0])->all()
            )
        );

        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA LATERAL',
            'pata'  =>  'POSTERIOR ESQUERDA',
            'path'  =>  $request->fotos_posterior_esquerda_lateral->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA PALMAR',
            'pata'  =>  'POSTERIOR ESQUERDA',
            'path'  =>  $request->fotos_posterior_esquerda_palmar->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA FRONTAL',
            'pata'  =>  'POSTERIOR ESQUERDA',
            'path'  =>  $request->fotos_posterior_esquerda_frontal->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA LATERAL',
            'pata'  =>  'POSTERIOR DIREITA',
            'path'  =>  $request->fotos_posterior_direita_lateral->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA PALMAR',
            'pata'  =>  'POSTERIOR DIREITA',
            'path'  =>  $request->fotos_posterior_direita_palmar->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA FRONTAL',
            'pata'  =>  'POSTERIOR DIREITA',
            'path'  =>  $request->fotos_posterior_direita_frontal->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA LATERAL',
            'pata'  =>  'ANTERIOR ESQUERDA',
            'path'  =>  $request->fotos_anterior_esquerda_lateral->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA PALMAR',
            'pata'  =>  'ANTERIOR ESQUERDA',
            'path'  =>  $request->fotos_anterior_esquerda_palmar->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA FRONTAL',
            'pata'  =>  'ANTERIOR ESQUERDA',
            'path'  =>  $request->fotos_anterior_esquerda_frontal->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA LATERAL',
            'pata'  =>  'ANTERIOR DIREITA',
            'path'  =>  $request->fotos_anterior_direita_lateral->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA PALMAR',
            'pata'  =>  'ANTERIOR DIREITA',
            'path'  =>  $request->fotos_anterior_direita_palmar->store('ocorrencias/fotos/','public')
        ]);
        $ocorrencia->fotos()->create([
            'type'  =>  'VISTA FRONTAL',
            'pata'  =>  'ANTERIOR DIREITA',
            'path'  =>  $request->fotos_anterior_direita_frontal->store('ocorrencias/fotos/','public')
        ]);

        DB::commit();

        //NOTIFICA ADMINISTRADORES
        $admins = User::where('is_admin',true)->get();
        foreach ($admins as $admin){
            Notification::send($admin, new NovaOcorrencia($ocorrencia));
        }

        return response()->json($ocorrencia,201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ocorrencia $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Ocorrencia $ocorrencia)
    {
        if($ocorrencia->user_id !== auth()->user()->id){
            abort(404);
        }
        return new OcorrenciaResource($ocorrencia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ocorrencia $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ocorrencia $ocorrencia
     * @return OcorrenciaResource
     */
    public function update(Request $request, Ocorrencia $ocorrencia)
    {
        $ocorrencia->update($request->all());
        return new OcorrenciaResource($ocorrencia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ocorrencia $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocorrencia $ocorrencia)
    {
        $ocorrencia->fotos()->delete();
        $ocorrencia->delete();

        return response()->noContent();
    }
}
