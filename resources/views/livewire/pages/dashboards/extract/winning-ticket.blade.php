<div>
    <div wire:loading.delay class="overlayLoading">
        <div class="spinner"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-header indica-card">
                <span class="float-left">Bilhetes Premiados</span>
                <span class="float-right">
                    <a href="{{route('admin.dashboards.extracts.add-winning-ticket')}}" class="btn btn-light">Cadastrar Bilhetes</a>
                </span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left: 10px;margin-right: 10px;">
        <div class="col-md-2">
            <div class="form-group">
                <select wire:model="range" class="custom-select" id="range" name="range">
                    <option value="0">Diário</option>
                    <option value="1">Ontem</option>
                    <option value="2">Semanal</option>
                    <option value="3">Mensal</option>
                    <option value="4">Personalizado</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6 @if($range != 4) d-none @endif">
                        <input wire:model="dateStart" type="text"
                               class="form-control @error('dateStart') is-invalid @enderror"
                               id="date_start"
                               name="dateStart"
                               autocomplete="off"
                               maxlength="50"
                               placeholder="Data Inicial"
                               onchange="this.dispatchEvent(new InputEvent('input'))">
                        @error('dateStart')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 @if($range != 4) d-none @endif">
                        <input wire:model="dateEnd" type="text"
                               class="form-control date @error('dateEnd') is-invalid @enderror"
                               id="date_end"
                               name="dateEnd"
                               autocomplete="off"
                               maxlength="50"
                               placeholder="Data Final"
                               onchange="this.dispatchEvent(new InputEvent('input'))">
                        @error('dateEnd')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row bg-white p-3">
        @forelse($dados as $dado)
            <div class="col-sm-12 col-md-6">
                <div class="alert">
                    <div class="col-md-12 col-sm-12">
                        <div class="d-flex flex-row">
                            <div class="col-12 bg-cyan align-middle text-left pt-1">
                                <h6>{{ $dado->user->name }} |
                                    <strong>Sorteado em:
                                        {{ \Carbon\Carbon::parse($dado->created_at)->format('d/m/Y') }}
                                    </strong>
                                </h6>
                                <small><strong>Sorteado:</strong> {{ $dado->draw->numbers }}</small><br>
                                <small><strong>Selecionados:</strong> {{ $dado->game->numbers }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-sm-12"><p>Nenhum jogo vendido.</p></div>
        @endforelse
    </div>
</div>


@push('scripts')
    <style>
        .spinner {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 9px solid;
            border-color: #dbdcef;
            border-right-color: #32689a;
            animation: spinner-d3wgkg 1s infinite linear;
            margin-left: calc(50% - 56px);
            margin-top: calc(25% - 56px);
        }
        .overlayLoading{
            min-width: 100%;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 99999;
            background-image: repeating-linear-gradient(45deg, #32689a 0, #32689a 3px, transparent 0, transparent 50%);
            background-size: 21px 21px;
            background-color: #333333;
            opacity: .9;
        }

        @keyframes spinner-d3wgkg {
            to {
                transform: rotate(1turn);
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="{{asset('admin/layouts/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="{{asset('admin/layouts/plugins/select2/js/select2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
        });

        var i18n = {
            previousMonth: 'Mês anterior',
            nextMonth: 'Próximo mês',
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            weekdays: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb']
        };

        var dateStart = new Pikaday({
            field: document.getElementById('date_start'),
            format: 'DD/MM/YYYY',
            i18n: i18n,
        });
        var dateEnd = new Pikaday({
            field: document.getElementById('date_end'),
            format: 'DD/MM/YYYY',
            i18n: i18n,
        });
    </script>

@endpush
