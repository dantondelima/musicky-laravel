@extends('layouts.admin')

@section('title', 'Visualizar artista')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">artista - {{ $artista->nome }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Visualizar artista</h6>
                </div>

                <div class="card-body">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Nome:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $artista->nome }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Idade:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $artista->idade }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Data de início da carreira:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $artista->data_inicio_carreira->format('d/m/Y') }}</div>
                </div>

                <!-- Button -->
                <div class="pl-lg-6 mb-4 ml-4">
                    <div class="row ">
                        <div class="col-lg-5">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
