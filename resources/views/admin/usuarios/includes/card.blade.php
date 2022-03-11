<!-- row -->
<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card custom-card border">
        <div class="card-body text-center">
            <div class="user-lock text-center">
                <a href="{{route('usuarios.show',$user)}}">
                    <img alt="avatar" class="rounded-circle" src="{{$user->profile_image_url}}">
                </a>
            </div>
            <a href="{{route('usuarios.show',$user)}}">
                <h5 class=" mb-1 mt-3 main-content-label">{{$user->name}}</h5>
            </a>
            <h4 class="main-content-label" style=" position: absolute;top:20px">#{{$user->id}}</h4>
            <p class="mb-2   tx-inverse">{{$user->profile_label}}</p>
            <small class="mb-2 d-block tx-inverse">{{$user->email}}</small>
            <a href="{{route('usuarios.show',$user)}}">
                <button class="btn color-button-primary">Acessar Perfil</button>
            </a>
        </div>
    </div>
</div>
