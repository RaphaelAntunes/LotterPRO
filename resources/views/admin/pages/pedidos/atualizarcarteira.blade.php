@extends('admin.layouts.master')

@section('title', 'Atualizar Carteira')

@section('content')
<div class="row  p-3">
    <div class="col-md-12">
        <div class="col-md-12 p-4 card-header">
            <h3 class="text-center text-bold">CARTEIRA</h3>
        </div>
        <div class="d-flex container ">
            <div class="input-group mb-3 card-header col-md-6 align-items-center mr-4">
                <svg width="50px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g fill="none" fill-rule="evenodd">
                            <circle cx="16" cy="16" r="16" fill="#26A17B"></circle>
                            <path fill="#FFF"
                                d="M17.922 17.383v-.002c-.11.008-.677.042-1.942.042-1.01 0-1.721-.03-1.971-.042v.003c-3.888-.171-6.79-.848-6.79-1.658 0-.809 2.902-1.486 6.79-1.66v2.644c.254.018.982.061 1.988.061 1.207 0 1.812-.05 1.925-.06v-2.643c3.88.173 6.775.85 6.775 1.658 0 .81-2.895 1.485-6.775 1.657m0-3.59v-2.366h5.414V7.819H8.595v3.608h5.414v2.365c-4.4.202-7.709 1.074-7.709 2.118 0 1.044 3.309 1.915 7.709 2.118v7.582h3.913v-7.584c4.393-.202 7.694-1.073 7.694-2.116 0-1.043-3.301-1.914-7.694-2.117">
                            </path>
                        </g>
                    </g>
                </svg>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
            <div class="input-group mb-3 card-header col-md-6 align-items-center">
                <div class="d-flex flex-column align-items-center justify-content-center mr-4">
                    <svg width="50px" fill="#37B4AA" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M11.917 11.71a2.046 2.046 0 0 1-1.454-.602l-2.1-2.1a.4.4 0 0 0-.551 0l-2.108 2.108a2.044 2.044 0 0 1-1.454.602h-.414l2.66 2.66c.83.83 2.177.83 3.007 0l2.667-2.668h-.253zM4.25 4.282c.55 0 1.066.214 1.454.602l2.108 2.108a.39.39 0 0 0 .552 0l2.1-2.1a2.044 2.044 0 0 1 1.453-.602h.253L9.503 1.623a2.127 2.127 0 0 0-3.007 0l-2.66 2.66h.414z">
                            </path>
                            <path
                                d="m14.377 6.496-1.612-1.612a.307.307 0 0 1-.114.023h-.733c-.379 0-.75.154-1.017.422l-2.1 2.1a1.005 1.005 0 0 1-1.425 0L5.268 5.32a1.448 1.448 0 0 0-1.018-.422h-.9a.306.306 0 0 1-.109-.021L1.623 6.496c-.83.83-.83 2.177 0 3.008l1.618 1.618a.305.305 0 0 1 .108-.022h.901c.38 0 .75-.153 1.018-.421L7.375 8.57a1.034 1.034 0 0 1 1.426 0l2.1 2.1c.267.268.638.421 1.017.421h.733c.04 0 .079.01.114.024l1.612-1.612c.83-.83.83-2.178 0-3.008z">
                            </path>
                        </g>
                    </svg>
                    <p>PIX</p>
                </div>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>

        </div>
        <div class="d-flex card-header flex-column container justify-content-center align-items-center">
            <div class="d-flex align-items-center flex-column">
                <div class="d-flex flex-column text-center mb-4 ">
                    <p>Senha de segurança</p>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
                <button type="button" style="background:#08890e;"
                    class="btn btn-success btn-side d-flex justify-content-around align-items-center">
                    <p>Adicionar Carteira</p>
                </button>

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

    input {
        text-align: center;
    }

    .cardinhos h1 {
        font-size: 20px;
    }

    .cardinhos p {
        font-size: 10px;
    }
</style>

@endpush
</div>
</div>
@endsection

@push('scripts')

@endpush