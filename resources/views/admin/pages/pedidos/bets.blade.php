@extends('admin.layouts.master')

@section('title', 'Bets')

@section('content')
<div class="row  p-3">
    <div class="col-md-12">
        <div class="col-md-12 p-4 card-header">
            <h3 class="text-center text-bold">Apostas</h3>
        </div>
        <div class="container">
           
          <div class="d-flex justify-content-center align-items-center card-header container">
            <select class="form-control"><option value="all">Status (Todos)</option><option value="16">acertos</option><option value="17">Nenhum Prêmio</option><option value="18">Premiado</option><option value="1">Aguardando</option><option value="4">Confirmado</option><option value="6">Cancelado</option><option value="9">Desligado</option><option value="11">Expirado</option></select>
            <select class="form-control"><option class="bg-light" value="5">5 Registros</option><option class="bg-light" value="10">10 Registros</option><option class="bg-light" value="25">25 Registros</option><option class="bg-light" value="50">50 Registros</option><option class="bg-light" value="100">100 Registros</option></select>
          </div>
            <table class="table container card-header">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>


        <style>
            .btn-primary:disabled {
                padding: 10px;
                font-weight: 700;
                color: #ffe400;
                background: #424647;
                border: #424647;
            }

            .btn-green {
                padding: 10px;

                font-weight: 700;
                color: #424647;
                background: #ffe400;
                border: #ffe400;
                box-shadow: 0 0 10px 2px rgba(163, 215, 18, .5);

            }
        </style>

        @push('styles')

        @endpush

        @push('scripts')
        <script src="https://sdk.mercadopago.com/js/v2"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

        <script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>

        <script type="text/javascript">
            var botoes = document.querySelectorAll('.btn-small');
                botoes.forEach(function(botao) {
                    botao.addEventListener('click', function(event) {
                        event.preventDefault();
                    });
                });
                
                        function formatInput(){
                            VMasker(document.getElementById("valueAdd")).maskMoney();
                        }
                
                                function redirect(link){
                           
                            window.open(link, "_blank");
                            window.location.href = 'recharge-order';
                        }
                        function redirectPix(){
                           window.location.href = 'recharge-order';
                       }
                
                       function extrairValorNumerico(valorFormatado) {
                        // Remove todos os caracteres que não são dígitos ou ponto
                        var valorNumerico = parseFloat(valorFormatado.replace(/[^0-9.]/g, ''));
                
                        // Se não for um número válido, retorna 0
                        return isNaN(valorNumerico) ? 0 : valorNumerico;
                    }
                
                    function somarComValor(valorASomar) {
                        // Pega o valor formatado do input
                        var valorFormatado = document.getElementById('valueAdd').value;
                
                        // Extrai o valor numérico a partir do valor formatado
                        var valorNumerico = extrairValorNumerico(valorFormatado);
                
                        // Soma os valores
                        var resultado = valorNumerico + valorASomar;
                
                        // Formata o resultado e substitui o valor no input
                        document.getElementById('valueAdd').value = VMasker.toMoney(resultado);
                        callMPPix();
                        
                    }   
        </script>
        @endpush
    </div>
</div>
@endsection

@push('scripts')
<script>
    function showSuccessMiniAlert(message) {
            toastr.success(message, "Aeee! \\o/", {
                timeOut: 5000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })
        }

        function copyText() {
            if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
                var $input = $('#input_output');
                $input.val();
                var el = $input.get(0);
                var editable = el.contentEditable;
                var readOnly = el.readOnly;
                el.contentEditable = true;
                el.readOnly = false;
                var range = document.createRange();
                range.selectNodeContents(el);
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
                el.setSelectionRange(0, 999999);
                el.contentEditable = editable;
                el.readOnly = readOnly;

                var successful = document.execCommand('copy');
                $input.blur();
                var msg = successful ? 'successful ' : 'un-successful ';
            }
            else{

                var copyTextarea = $('#input_output');
                copyTextarea.select();

                var successful = document.execCommand('copy');
                var msg = successful ? 'successful ' : 'unsuccessful';
            }

            showSuccessMiniAlert('Código copiado');
        }
</script>
@endpush