<a style="background-color: #0ba36025"  class="media new" href="/ocorrencias/{{$ocorrencia->id}}?notification={{$n->id}}">
    <div class="main-img-user online"><img alt="avatar" src="{{$ocorrencia->user->profile_image_url}}"></div>
    <div class="media-body">
        <p><strong>{{$ocorrencia->user->name }} </strong> cadastrou uma nova ocorrência</p><span>{{$ocorrencia->created_at->diffForHumans()}}</span>
    </div>
</a>
