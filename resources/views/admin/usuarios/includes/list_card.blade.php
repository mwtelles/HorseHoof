<div class="row " id="list-card-users">
    @foreach($users as $user)
        @include('admin.usuarios.includes.card')
    @endforeach
</div>
