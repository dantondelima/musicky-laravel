@extends('layouts.admin')

@section('title', 'Criar musica')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Músicas</h1>

    @include('inc.feedback')

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Criar musica</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('musica.store') }}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="razao_social">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('nome') ? ' is-invalid' : '' }}" id="nome" required name="nome" placeholder="Exemplo nome" value="{{old('nome')}}">
                                        @if ($errors->has('nome'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('nome') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Álbum<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('album_id') ? ' is-invalid' : '' }}" name="album_id" id="album_id" >
                                            <option value="">Selecione o álbum</option>
                                            @foreach ($albuns as $album)
                                                <option value="{{ $album->id }}" {{ old('album_id') == $album->id? "selected":""}}>{{ $album->nome }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('album_id'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('album_id') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                <label class="form-control-label" for="nome">Artista (segure shift para selecionar múltiplos artistas)<span class="small text-danger">*</span></label>
                                        <select multiple class="form-control form-control-user{{ $errors->has('artista_id') ? ' is-invalid' : '' }}" name="artista_id[]" id="artista_id" >
                                            <option value="">Selecione o(s) artista(s)</option>
                                            @foreach ($artistas as $artista)
                                                <option value="{{ $artista->id }}" {{ old('artista_id') == $artista->id? "selected":""}}>{{ $artista->nome }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('artista_id'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('artista_id') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-6">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center">
                                    <button type="submit" class="btn btn-primary form-control" style="color:white">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#status').change(function() {
            if(!$(this).is(':checked')){
                $('#status-field').val(0);
            }
            else{
                $('#status-field').val(1);
            }
        })
    });
</script>
@endsection
