@extends('admin.layouts.app')

@section('content')

    <div class="main-content-body tab-pane border-top-0 active" id="friends">
        <div class="card-body border pd-b-10">
            <div class="row">
                <div class="col-12 pb-5">
                    <input id="search" placeholder="Buscar usuário" type="text" class="form-control">
                </div>
            </div>
            <div id="list">
                @include('admin.usuarios.includes.list_card')
            </div>
        </div>
    </div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('keyup','#search',function (e) {
       let input_search = $(e.target);
        $.ajax({
            'url':'/search/usuarios/card_list?search='+input_search.val(),
            headers:{
                'X-CSRF-TOKEN':'{{@csrf_token()}}'
            },
            success:function (data) {
                $('#list').html(data);
            }
        })
    });
</script>
