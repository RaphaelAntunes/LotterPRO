@extends('admin.layouts.master')

@section('title', 'Saque Premiação')

@section('content')
<div class="row  p-3">
    <div class="col-md-12">
        <div class="col-md-12 p-4 card-header">
            <h3 class="text-center text-bold">SAQUE DE PREMIAÇÃO</h3>
        </div>
        <div class="    ">
            <div class="d-flex flex-column">
                <div class="d-flex container justify-content-center mb-3">
                    <div class="card-master card-master-bottom text-center  p-4">
                        <p>Saldo de premiações</p>
                        <h1>R$ 0,00</h1>
                    </div>
                    <div class="card-master card-master-bottom  mr-md-5 ml-md-5 text-center p-4">
                        <p>Valor Mínimo para Saque</p>
                        <h1>R$ 0,00</h1>
                    </div>
                    <div class="card-master card-master-bottom text-center  p-4">
                        <p>Taxa de Saque</p>
                        <h1>0%</h1>
                    </div>
                </div>


                <div class="d-flex card-header flex-column container justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <p>Moeda</p>
                                <select class="custom-select border border-1 border-dark fw-bold mb-0 h-75">
                                    <option class="custom-select" value="pix">PIX (Somente no Brasil)</option>
                                </select>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center mr-5 ml-5">
                                <p>Carteira PIX</p>
                                <input class="search-query form-control" type="text" name="" id="">
                            </div>

                        </div>
                        <div class="d-flex">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <p>Valor</p>
                                <input class="search-query form-control" type="text" name="" id="">

                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center mr-5 ml-5">
                                <p>Senha</p>
                                <input class="search-query form-control" type="text" name="" id="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex container" style="padding:0px;">
                <div class="d-flex card-header flex-column container justify-content-center align-items-center">
                    <div class="d-flex">
                        <div class="d-flex container justify-content-center mb-3">
                            <div class="card-master cardinhos card-master-bottom text-center  p-4">
                                <p>Retirada</p>
                                <h1>R$ 0,00</h1>
                            </div>
                            <div class="card-master cardinhos card-master-bottom text-center p-4">
                                <p>Taxa de Saque</p>
                                <h1>R$ 0,00</h1>
                            </div>
                            <div class="card-master cardinhos card-master-bottom text-center  p-4">
                                <p>Total</p>
                                <h1>R$ 0,00</h1>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex card-header flex-column container justify-content-center align-items-center">
                    <div class="d-flex">
                        <button type="button" style="background:#FFE400; color:black;"
                            class="btn btn-success btn-side d-flex mr-4 justify-content-around align-items-center">
                            <p>Alterar Carteira</p>
                        </button> <button type="button" style="background:#08890e;"
                        class="btn btn-success btn-side d-flex justify-content-around align-items-center">
                        <p>RETIRADA</p>
                    </button>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('styles')
    <style>
        @media screen and (max-width: 760px) {
            .btn-info {
                font-size: 9px;
            }

            tbody tr td {
                font-size: 9px;
            }
        }

        p {
            margin: 0;
        }

        input{
            text-align: center;
        }

        .cardinhos h1{
            font-size: 20px;
        }
        .cardinhos p{
            font-size: 10px;
        }
    </style>

    @endpush
</div>
</div>
@endsection

@push('scripts')

@endpush