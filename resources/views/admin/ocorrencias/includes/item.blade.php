<tr class="border-bottom odd" role="row">
    <td class="font-weight-bold">{{$ocorrencia->id}}</td>
    <td class="font-weight-bold">{{$ocorrencia->nome}}</td>
    <td class="sorting_1">{{$ocorrencia->user->email}}</td>
    <td class="sorting_1">{{$ocorrencia->cavalo->apelido}}</td>
    <td class="font-weight-semibold">{!! $ocorrencia->span_status !!}</td>
    <td class="sorting_1" style="display: flex" >
        <a href="/ocorrencias/{{$ocorrencia->id}}">
                                                                            <span class="crypto-icon bg-primary-transparent mr-3 my-auto">
                                                                              <i class="fe fe-arrow-up-right text-primary"></i>
                                                                            </span>
        </a>

        <form method="post" action="{{route('ocorrencias.destroy',$ocorrencia)}}">
            @csrf
            @method('delete')
            <button onclick="return confirm('Tem certeza que deseja deletar essa ocorrência?');" style="border: none" class="crypto-icon bg-danger mr-3 my-auto" type="submit" ><i class="fa fa-trash"></i></button>
        </form>
    </td>
</tr>
