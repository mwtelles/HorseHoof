@extends('admin.layouts.app')

@section('css')
    <link href="/assets/plugins/gallery/gallery.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Row -->
            <div class="row row-sm mt-4 cel-responsible">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-lg-flex">
                                <h2 class="main-content-label mb-1">#{{$ocorrencia->id}}</h2>
                                <div class="ml-auto">
                                    <p class="mb-0"><span
                                            class="font-weight-bold">Data Cadastro: </span>{{$ocorrencia->created_at->format('d/m/Y')}}
                                    </p>
                                </div>
                            </div>
                            <hr class="mg-b-40">
                            <div class="row row-sm">
                                <div class="col-lg-6">
                                    <p class="h3">Dados do usuario</p>
                                    <address>
                                        {{$ocorrencia->user->name}}<br>
                                        <b><a style="color: black" href="/usuarios/{{$ocorrencia->user->id}}/perfil">{{$ocorrencia->user->email}}</a><br></b>
                                    </address>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <p class="h3">Dados do cavalo</p>
                                    <address>
                                        {{$ocorrencia->cavalo->apelido}}<br>
                                        {{$ocorrencia->cavalo->raca->nome}}<br>
                                        {{$ocorrencia->cavalo->sexo}}<br>
                                        {{$ocorrencia->cavalo->idade}}
                                    </address>
                                </div>
                            </div>
                            <div class="card-body" style="max-width: 1000px;">
                                <div class="casco-frontal mb-4">
                                    <span>POSTERIOR DIREITA</span>
                                    <ul id="imagens1" class="row mb-0 mt-4" style="list-style: none;">
                                        @foreach($ocorrencia->fotos()->where('pata','POSTERIOR DIREITA')->get() as $foto)
                                            <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 mb-3"
                                                data-responsive="/storage/{{$foto->path}}"
                                                data-src="/storage/{{$foto->path}}">
                                                <a href="" class="wd-50p">
                                                    <img class="img-responsive" src="/storage/{{$foto->path}}"
                                                         alt="Thumb-1">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="casco-lateral mb-4">
                                    <span>POSTERIOR ESQUERDA</span>
                                    <ul id="imagens2" class="row mb-0 mt-4" style="list-style: none;">
                                        @foreach($ocorrencia->fotos()->where('pata','POSTERIOR ESQUERDA')->get() as $foto)
                                            <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 mb-3"
                                                data-responsive="/storage/{{$foto->path}}"
                                                data-src="/storage/{{$foto->path}}">
                                                <a href="" class="wd-50p">
                                                    <img class="img-responsive" src="/storage/{{$foto->path}}"
                                                         alt="Thumb-2">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="casco-inferior mb-4">
                                    <span>ANTERIOR ESQUERDA</span>
                                    <ul id="imagens3" class="row mb-0 mt-4" style="list-style: none;">
                                        @foreach($ocorrencia->fotos()->where('pata','ANTERIOR ESQUERDA')->get() as $foto)
                                            <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 mb-3"
                                                data-responsive="/storage/{{$foto->path}}"
                                                data-src="/storage/{{$foto->path}}">
                                                <a href="" class="wd-50p">
                                                    <img class="img-responsive" src="/storage/{{$foto->path}}"
                                                         alt="Thumb-3">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="casco-inferior mb-4">
                                    <span>ANTERIOR DIREITA</span>
                                    <ul id="imagens4" class="row mb-0 mt-4" style="list-style: none;">
                                        @foreach($ocorrencia->fotos()->where('pata','ANTERIOR DIREITA')->get() as $foto)
                                            <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 mb-3"
                                                data-responsive="/storage/{{$foto->path}}"
                                                data-src="/storage/{{$foto->path}}">
                                                <a href="" class="wd-50p">
                                                    <img class="img-responsive" src="/storage/{{$foto->path}}"
                                                         alt="Thumb-3">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if($ocorrencia->anotacao)
                            <div class="valign-middle" colspan="2" rowspan="4">
                                <div class="invoice-notes" style="padding: 2rem;
                    border: 1px solid lightgrey;
                    margin: 1rem;
                    border-radius: 40px;">
                                    <label class="main-content-label tx-13">Nota</label>
                                    <p>{{$ocorrencia->anotacao}}</p>
                                </div><!-- invoice-notes -->
                            </div>
                        @endif

                        <div class="card-footer ">
                            <form method="post" enctype="multipart/form-data" action="/ocorrencias/{{$ocorrencia->id}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @if(!$ocorrencia->relatorio)
                                    <div class="col-12">
                                        <label>Anexar relatório</label>
                                        <input accept="application/pdf" required type="file" name="relatorio" class="form-control">
                                    </div>
                                        <div class="col-12  " style="margin-top: 40px">
                                            <button type="submit" class="btn ripple color-button-primary mb-1"><i
                                                    class="fe fe-credit-card mr-1"></i> Enviar Relatorio
                                            </button>
                                        </div>
                                    @else
                                        <div class="col-12 ">
                                            <h2><a class="btn btn-info btn-lg" target="_blank" href="{{\Illuminate\Support\Facades\Storage::url($ocorrencia->relatorio->path)}}" >Visualizar relatório</a></h2>
                                        </div>
                                    @endif


                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Internal Gallery js-->
    <script src="/assets/plugins/gallery/picturefill.js"></script>
    <script src="/assets/plugins/gallery/lightgallery.js"></script>
    <script src="/assets/plugins/gallery/lightgallery-1.js"></script>
    <script src="/assets/plugins/gallery/lg-pager.js"></script>
    <script src="/assets/plugins/gallery/lg-autoplay.js"></script>
    <script src="/assets/plugins/gallery/lg-fullscreen.js"></script>
    <script src="/assets/plugins/gallery/lg-zoom.js"></script>
    <script src="/assets/plugins/gallery/lg-hash.js"></script>
    <script src="/assets/plugins/gallery/lg-share.js"></script>

    <script>
        lightGallery(document.getElementById('imagens1'), {
            thumbnail: true,
            animateThumb: false,
            zoomFromOrigin: false,
            allowMediaOverlap: true,
            toggleThumb: true,
        });
        lightGallery(document.getElementById('imagens2'), {
            thumbnail: true,
            animateThumb: false,
            zoomFromOrigin: false,
            allowMediaOverlap: true,
            toggleThumb: true,
        });
        lightGallery(document.getElementById('imagens3'), {
            thumbnail: true,
            animateThumb: false,
            zoomFromOrigin: false,
            allowMediaOverlap: true,
            toggleThumb: true,
        });
        lightGallery(document.getElementById('imagens4'), {
            thumbnail: true,
            animateThumb: false,
            zoomFromOrigin: false,
            allowMediaOverlap: true,
            toggleThumb: true,
        });

    </script>
@endsection

