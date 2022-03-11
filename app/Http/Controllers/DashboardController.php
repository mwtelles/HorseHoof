<?php

namespace App\Http\Controllers;

use App\Models\Cavalo;
use App\Models\Ocorrencia;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_users = User::count();
        $total_ocorrencias = Ocorrencia::count();
        $total_animais = Cavalo::count();
        $ultimas_ocorrencias = Ocorrencia::orderByDesc('id')->limit(7)->get();
        $total_macho = Cavalo::machos()->count();
        $total_femea = Cavalo::femeas()->count();
        return view('admin.dashboard',
        [
            'total_users'   =>  $total_users,
            'total_ocorrencias'   =>  $total_ocorrencias,
            'total_animais'   =>  $total_animais,
            'ultimas_ocorrencias'   =>  $ultimas_ocorrencias,
            'total_macho'   =>  $total_macho,
            'total_femea'   =>  $total_femea,
        ]);
    }
}
