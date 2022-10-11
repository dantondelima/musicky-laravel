@extends('admin.layouts.admin')

@section('title', 'Candidatos')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Candidatos</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <h6 class="m-0 font-weight-bold text-primary">Gerenciamento de candidatos</h6>
            </div>
            <div class="col-md-7"></div>
            <div class="col-md-2 col-xs-12">
                    <a class="btn btn-primary form-control" href="{{ route('admin.candidatos.create') }}" style="color:white">Criar novo</a>
            </div>
        </div>
    </div>
    <div class="card-body" id="feedback">
        <form method="get" action="" class="form form-horizontal">
            <div class="form-group row">
                <div class="col-md-8">
                </div>
                <div class="col-md-3 col-xs-12">
                    <input type="text" class="form-control" name="search" value="{{ isset($request['search'])?$request['search']:'' }}" placeholder="Buscar">
                </div>
                <div class="col-md-1 col-xs-12">
                    <button type="submit" class="btn btn-primary form-control" style="color:white"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            @include('inc.feedback')
            <table class="table table-bordered datatable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th style="text-align:center" colspan="3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($candidatos as $candidato)
                        <tr>
                            <td class="">{{$candidato->id}}</td>
                            <td  class="col-md-4">{{$candidato->nome}}</td>
                            <td  class="col-md-4">{{$candidato->cpf}}</td>
                            <td  class="col-md-4">{{$candidato->email}}</td>
                            <td class="col-md-1"><a role="button" href="{{ route('admin.candidatos.show', ['candidato' => $candidato->id])}}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-eye"></i>  </a></td>
                            <td class="col-md-1"><a role="button" href="{{ route('admin.candidatos.edit', ['candidato' => $candidato->id])}}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-edit"></i>  </a></td>
                            <td class="col-md-1">
                                <form action="{{ route("admin.candidatos.destroy", ['candidato' => $candidato->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-user btn-block classe-deletar"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="font-size:25px;" colspan="5"><b>Nenhum candidato encontrado</b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            {{ $candidatos->links() }}
        </div>
    </div>
</div>
@section('scripts')

@endsection
@stop
