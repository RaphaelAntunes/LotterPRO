@extends('admin.layouts.master')

@section('title', 'Saque - Solicitações')

@section('content')
<div class="row  p-3">
    <div class="col-md-12">
        <div class="col-md-12 p-4 card-header">
            <h3 class="text-center text-bold">CARTEIRA</h3>
        </div>
        <div class="card card-body border-0 shadow mb-4 bg-custom-light">
            <div class="row mb-3">
                <div class="mb-4">
                    <div class="w-100 d-flex gap-3">
                        <div class="fs-3 fw-bold">TESTE3</div>
                        <div class="fs-3 fw-bold">(teste3)</div>
                    </div>
                    <div class="w-100 d-flex gap-3">
                        <div class="fs-5">Indicante:</div>
                        <div class="fs-5 fw-bold">sistema</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mt-3">
                        <div class="text-center _userPhoto_1ags8_1"><img src="/fotos/user.png" crossorigin="anonymous"
                                alt="user" class="img-thumbnail img-fluid shadow"></div>
                        <div class="text-center"><input type="file" id="file" class="d-none" wfd-id="id2"></div>
                    </div>
                </div>
                <div class="col-md-10">
                    <h2 class="fs-5 text-plight mb-4">Dados Pessoais</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="bg-dark text-light p-2">Nome</div><input class="form-control" id="name"
                                    type="text" placeholder="Nome" value="teste3" wfd-id="id3">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="bg-dark text-light p-2">Email</div>
                                <div class="form-control">teste3@teste3.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
                                <div class="bg-dark text-light p-2">Nascimento</div>
                                <div class="form-control">12/01/1999</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
                                <div class="bg-dark text-light p-2">Código do País</div><input class="form-control"
                                    id="ddi" type="text" placeholder="+Código do País" value="351" wfd-id="id4">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="bg-dark text-light p-2">Número do Telefone</div><input class="form-control"
                                    id="phone" type="text" placeholder="Número do Telefone" value="12312312312"
                                    wfd-id="id5">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <div class="bg-dark text-light p-2">Nova Senha</div><input class="form-control"
                                        type="password" id="password" placeholder="Senha" value="Teste3@teste3.com"
                                        wfd-id="id6"><button class="btn btn-outline-light"><i
                                            class="fa fa-eye"></i></button>
                                    <div class="invalid-feedback bg-danger p-1 mt-0">Sua senha deve ter pelo menos 8
                                        caracteres, com letras maiúsculas, minúsculas, números e caracteres especiais
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <div class="bg-dark text-light p-2">Confirmar Nova Senha</div><input
                                        class="form-control" id="confirmPassword" type="password"
                                        placeholder="Confirmar Nova Senha" value="" wfd-id="id7">
                                    <div class="invalid-feedback bg-danger p-1 mt-0">A Confirmação e a Nova Senha devem
                                        ser iguais</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-lg-5 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">Rua:</div><input id="street" type="text"
                            class="form-control" placeholder="Rua" value="abra cada bra" wfd-id="id8">
                    </div>
                </div>
                <div class="form-group col-lg-2 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">Número:</div><input id="number" type="text"
                            class="form-control" placeholder="Número" value="213" wfd-id="id9">
                    </div>
                </div>
                <div class="form-group col-lg-5 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">Complemento:</div><input id="complement" type="text"
                            class="form-control" placeholder="Complemento" value="123" wfd-id="id10">
                    </div>
                </div>
                <div class="form-group col-lg-4 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">Bairro/Distrito:</div><input id="district" type="text"
                            class="form-control" placeholder="Bairro/Distrito" value="" wfd-id="id11">
                    </div>
                </div>
                <div class="form-group col-lg-4 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">Cidade:</div><input id="city" type="text"
                            class="form-control" placeholder="Cidade" value="123123" wfd-id="id12">
                    </div>
                </div>
                <div class="form-group col-lg-4 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">Estado:</div><input id="state" type="text"
                            class="form-control" placeholder="Estado" value="312312" wfd-id="id13">
                    </div>
                </div>
                <div class="form-group col-lg-6 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">País:</div><input id="country" type="text"
                            class="form-control" placeholder="País" value="Portugal" wfd-id="id14">
                    </div>
                </div>
                <div class="form-group col-lg-3 mb-3">
                    <div class="input-group">
                        <div class="bg-dark text-light p-2">CEP:</div><input id="zipcode" type="text"
                            class="form-control" placeholder="CEP" value="12312" wfd-id="id15">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3"><button
                        class="btn bg-custom-light btn-sm h-100 d-flex align-items-center px-3" type="button"><i
                            class="fa fa-id-card fa-2x me-2"></i><span class="fs-5">VERIFICAÇÃO DE IDENTIDADE
                            (KYC)</span></button></div>
                <div class="col-lg-4 mb-3"><button class="btn btn-danger btn-sm h-100 d-flex align-items-center px-3"
                        type="button"><i class="fa fa-qrcode fa-2x me-2"></i><span class="fs-5">AUTENTICAÇÃO DE DOIS
                            FATORES (2FA)</span></button></div>
                <div class="col-lg-4 mb-3"><button class="btn btn-warning btn-sm h-100 d-flex align-items-center px-3"
                        type="button"><i class="fa fa-lock fa-2x me-3"></i>
                        <div>
                            <div class="fs-5">ALTERAR SENHA DE SEGURANÇA</div>
                            <div class="fs-7">A senha de segurança é utilizada para realizar movimentações financeiras
                            </div>
                        </div>
                    </button></div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-between flex-wrap "><button class="btn btn-success btn-lg mb-3"
                        type="button"><i class="fa fa-save me-2"></i><span>Salvar</span></button><button
                        class="btn btn-danger btn-lg mb-3" type="button"><i
                            class="fa fa-ban me-2"></i><span>Autoexclusão</span></button></div>
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

 
</style>

@endpush
</div>
</div>
@endsection

@push('scripts')

@endpush