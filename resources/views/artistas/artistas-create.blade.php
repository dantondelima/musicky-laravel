@extends('layouts.admin')

@section('title', 'Criar artista')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Artistas</h1>

    @include('inc.feedback')

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Criar artista</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('artista.store') }}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger">*</span></label>
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
                                        <label class="form-control-label" for="idade">Idade<span class="small text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-user{{ $errors->has('idade') ? ' is-invalid' : '' }}" id="idade" required name="idade" placeholder="21.." value="{{old('idade')}}">
                                        @if ($errors->has('idade'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('idade') }}</strong>
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
                                        <label class="form-control-label" for="data_inicio_carreira">Data de início da carreira<span class="small text-danger">*</span></label>
                                        <input type="date" class="form-control form-control-user{{ $errors->has('data_inicio_carreira') ? ' is-invalid' : '' }}" id="data_inicio_carreira" required name="data_inicio_carreira" placeholder="21.." value="{{old('data_inicio_carreira')}}">
                                        @if ($errors->has('data_inicio_carreira'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('data_inicio_carreira') }}</strong>
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
