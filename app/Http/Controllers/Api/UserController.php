<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ferrador;
use App\Models\User;
use App\Models\Veterinario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {

        DB::beginTransaction();
        $data = $request->except('profile_image_url');


        Validator::make($data, [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['string', 'min:8',],
            'data_nascimento' => [Rule::requiredIf(function () use ($request) {
                return $request->profile_image_url == null;
            })],
            'cidade_id' =>  [Rule::requiredIf(function () use ($request) {
                return $request->profile_image_url == null;
            }),'exists:cidades,id']
        ])->validate();

        if(isset($data['data_nascimento'])) $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $data['data_nascimento']);

        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }

        if(isset($request->profile_image_url)){
            $path = $request->file('profile_image_url')->store('users/profile_image','public');
            $user->update([
                'profile_image_url' => $path
            ]);
        }
        if($request->profile_type!= null){
            $data['profile_type'] = User::PROFILES[(int)$request->profile_type];

            if((int)$request->profile_type === 0){
                $ferrador = Ferrador::updateOrCreate(['id'=>$user->profile_id],$data);
                $data['profile_id'] =  $ferrador->id;
                if((int)$data['is_membro_afb'] === 1){
                    $data['associacao'] = null;
                }
            }elseif((int)$request->profile_type === 1){
                $veterinario = Veterinario::updateOrCreate(['id'=>$user->profile_id],$data);
                $data['profile_id'] =  $veterinario->id;
            }
        }
        $user->update($data);
        DB::commit();
        return response()->json($user);
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
