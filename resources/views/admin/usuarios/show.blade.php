@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Row -->
            <div class="row row-sm mt-4">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h3 class="main-content-label">Perfil do Usuário</h3>
                        </div>
                        <div class="card-body text-center item-user">
                            <br class="profile-pic">
                            <div class="profile-pic-img">
                                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title=""
                                          data-original-title="online"></span>
                                <img width="60" src="{{$user->profile_image_url}}" class="rounded-circle" alt="user">
                            </div>
                            <a href="#" class="text-dark"><h5
                                    class="mt-3 mb-0 font-weight-semibold">{{$user->name}}</h5></a>
                            <small
                                class="mt-3 mb-0 font-weight-semibold">{{$user->email}}</small></br>
                            <small
                                class="mt-3 mb-0 font-weight-semibold">Membro
                                desde {{$user->created_at->format('d/m/Y')}}</small>
                            </br>
                            <a href="/usuarios/{{$user->id}}/perfil" type="button"
                               class="btn ripple btn-sm color-button-primary mb-1"> Editar
                            </a>
                        </div>

                    </div>
                    <ul class="item1-links nav nav-tabs  mb-0" style="padding: 1.2rem;">
                        <li class="nav-item">
                            <a data-target="#orders" class="nav-link active" data-toggle="tab" role="tablist"><i
                                    class="ti-user icon1"></i> Ocorrencias</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                <div class="d-flex mb-4">
                                    <label class="main-content-label my-auto">Todas Ocorrências</label>
                                    <h6 class="mb-0 ml-auto"></h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table border text-md-nowrap text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>CAVALO</th>
                                            <th class="text-right">STATUS</th>
                                            <th class="text-right">AÇÃO</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($user->ocorrencias as $ocorrencia)
                                            <tr>
                                                <th scope="row">#{{$ocorrencia->id}}</th>
                                                <td>{{$ocorrencia->cavalo->apelido}}</td>
                                                <td class="text-right">{!! $ocorrencia->span_status !!}</td>
                                                <td class="text-right">
                                                    <a href="{{route('ocorrencias.show',$ocorrencia)}}">
                                                        <button type="button"
                                                                class="btn ripple color-button-primary mb-1">Ver
                                                            Ocorrência
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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
@endsection
