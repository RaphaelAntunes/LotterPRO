@extends('admin.layouts.master')

@section('title', 'Pedidos de Recarga')

@section('content')
    <div class="row  p-3">
        <div class="col-md-12">
            <div>
                <div class="col-md-12 p-4 card-header">
                        <h3 class="text-center text-bold">PEDIDOS DE RECARGA</h3>
                    </div>
                    <div class="row  p-3">
                        <div class="col-md-12">
                           
                            <div class="table-responsive extractable-cel">
                                <table class="table table-striped table-hover table-sm dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('admin.pagesF.date') }}</th>
                                        <th>{{ trans('admin.pagesF.status') }}</th>
                                        <th>Tipo</th>
                                        <th>{{ trans('admin.pagesF.valor') }}</th>
                                        <th>Restante</th>
                                        <th>{{ trans('admin.pagesF.acoes') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>15204</td>
                                            <td>05/06/2024 - 23:45</td>
                                            <td>Aguardando</td>
                                            <td>Saldo</td>
                                            <td>10,00</td>
                                            <td>Aguardando Pagamento</td>

                                            <td width="5%" align="center">
                                                <a href=""
                                                   type="button"
                                                   class="btn btn-info">
                                                    <i class="fa fa-eye"></i>
                                                    {{ trans('admin.pagesF.detalhes') }}
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
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
                
                
                
                    </style>
                @endpush
                        </div>
    </div>
@endsection

@push('scripts')

@endpush
