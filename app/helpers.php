<?php


use App\Models\Ocorrencia;
use App\Models\User;

function getNotificationHtmlporTipo($notification){

    if($notification->type == 'App\Notifications\NovoUsuario'){
        $user_id = (int)$notification->data['user_id'];
        $user =  User::find($user_id);
        if($user){
            return view('admin.layouts.notifications.novo_usuario',['n'=>$notification,'user'=>$user]);
        }
    }
    if($notification->type == 'App\Notifications\NovaOcorrencia'){
        $ocorrencia_id = (int)$notification->data['ocorrencia_id'];
        $ocorrencia =  Ocorrencia::find($ocorrencia_id);
        if($ocorrencia){
            return view('admin.layouts.notifications.nova_ocorrencia',['n'=>$notification,'ocorrencia'=>$ocorrencia]);
        }
    }
}


