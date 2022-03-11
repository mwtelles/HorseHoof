
<a class="media new" style="background-color: #0ab2e625" href="/usuarios/{{$user->id}}?notification={{$n->id}}">
    <div class="main-img-user online"><img alt="avatar" src="{{$user->profile_image_url}}"></div>
    <div class="media-body">
        <p  ><strong>{{$user->name }} </strong> realizou o cadastro no aplicativo!</p><span>{{$user->created_at->diffForHumans()}}</span>
    </div>
</a>
