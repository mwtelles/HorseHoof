@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="inner-body">
            <div class="row">
                <div class="col-12 pt-5">
                    <input id="search" placeholder="Buscar ocorrência" type="text" class="form-control">
                </div>
            </div>
            <div class="row row-sm mt-4 cel-responsible">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card custom-card transcation-crypto">
                        <div class="card-header border-bottom-0">
                            <div class="main-content-label">OCORRÊNCIAS</div>
                            <p class="d-block tx-12 mb-0 mt-2 text-muted">Aqui você encontra todas as ocorrências
                                cadastradas no sistema, por ordem decrescente.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table  ">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            style="width: 160.77px;">#
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            style="width: 160.77px;">NOME
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            style="width: 160.77px;">EMAIL
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            style="width: 60.77px;">CAVALO
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            style="width: 60.7875px;">STATUS
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            style="width: 44.7875px;">DETALHES
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @include('admin.ocorrencias.includes.list')
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('keyup', '#search', function (e) {
        let input_search = $(e.target);
        $.ajax({
            'url': '/search/ocorrencias/table_list?search=' + input_search.val(),
            headers: {
                'X-CSRF-TOKEN': '{{@csrf_token()}}'
            },
            success: function (data) {
                $('tbody').html(data);
            }
        })
    });
</script>
