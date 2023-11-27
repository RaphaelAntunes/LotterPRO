<div>
    <div class="col-md-12 p-4 faixa-jogos">
        <h3 class="text-center text-bold">{{ trans('admin.pagesF.carteira') }}</h3>
    </div>
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header indica-card">
                <h3 class="card-title">{{ trans('admin.pagesF.addSaldo') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div x-data="{}" id="custom-search-input">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-7">
                                                        <h6 class="my-0">{{ trans('admin.pagesF.valorAdd') }}</h6>
                                                        <small class="text-muted">{{ trans('admin.pagesF.valorMin') }} R$ 1,00

                                                            <small class="text-muted"><p>{{ trans('admin.pagesF.valorInserido') }}</p></small>
                                                        </small>
                                                    </div>

                                                    <div class="col-sm-12 col-md-5 input-group">
                                                        <input wire:model="valueAdd" x-on:focus="formatInput()"
                                                               type="text" name="valueAdd" id="valueAdd"
                                                               class="search-query form-control w-100" placeholder="Valor" />
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="input-group-append bt-recharge">
                                             @if(config('services.activeGateway') == 'MP')
                                                 <button wire:click.prevent="callMPPix" type="submit"
                                                         @if($valueAdd <= 0.99) disabled @endif

                                                        class="btn btn-info btn-md btn-block">{{ trans('admin.lwIndicated.cont') }} {{$valueAdd}}</button>
                                             @elseif(config('services.activeGateway') == 'doBank')
                                             <button wire:click.prevent="callDoBank" type="submit"
                                                     @if($valueAdd <= 9.99) disabled @endif

                                                    class="btn btn-info btn-md btn-block">{{ trans('admin.lwIndicated.cont') }}  {{$valueAdd}}</button>
                                             @else
                                                 <button wire:click.prevent="callZoop" type="submit"
                                                     @if($valueAdd <= 9.99) disabled @endif
                                                     class="btn btn-info btn-md btn-block"> {{ trans('admin.lwIndicated.cont') }} {{$valueAdd}}</button>
                                             @endif
                                        </div>
                                        <div class="input-group-append mr-2 bt-recharge">
                                             <button wire:click.prevent="callZoopPix" type="submit"
                                                    @if($valueAdd <= 0.99) disabled @endif

                                                class="btn btn-info btn-md btn-block">Pix automático</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('styles')

@endpush

@push('scripts')
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    <script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>

    <script type="text/javascript">
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
    </script>
@endpush
