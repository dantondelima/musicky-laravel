@extends('layouts.admin')

@section('title', 'Artistas')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Artistas</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <h6 class="m-0 font-weight-bold text-primary">Listagem de Artistas</h6>
            </div>
            <div class="col-md-7"></div>
            <div class="col-md-2 col-xs-12">
                    <a class="btn btn-primary form-control" href="{{ route('artista.create') }}" style="color:white">Criar novo</a>
            </div>
        </div>
    </div>
    <div class="card-body" id="feedback">
        <div class="table-responsive">
            @include('inc.feedback')
            <table class="table table-bordered datatable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Data de início da carreira</th>
                        <th style="text-align:center" colspan="3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($artistas as $artista)
                        <tr>
                            <td class="">{{$artista->id}}</td>
                            <td  class="col-md-4">{{$artista->nome}}</td>
                            <td  class="col-md-4">{{$artista->idade}}</td>
                            <td  class="col-md-4">{{$artista->data_inicio_carreira->format('d/m/Y')}}</td>
                            <td class="col-md-1"><a role="button" href="{{ route('artista.show', ['artista' => $artista->id])}}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-eye"></i>  </a></td>
                            <td class="col-md-1"><a role="button" href="{{ route('artista.edit', ['artista' => $artista->id])}}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-edit"></i>  </a></td>
                            <td class="col-md-1">
                                <form action="{{ route("artista.destroy", ['artista' => $artista->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-user btn-block classe-deletar"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="font-size:25px;" colspan="5"><b>Nenhum artista encontrado</b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')

@endsection
@stop
