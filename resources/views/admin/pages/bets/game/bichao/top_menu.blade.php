<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center flex-md-row flex-column align-items-center">
        <div>
        <a href="{{ route('admin.bets.bichao.index') }}">
            <button class="btn btn-info my-2 ml-1">{{ trans('admin.bichao.apostar') }}</button>
        </a>
        <a href="{{ route('admin.bets.bichao.resultados') }}">

            <button class="btn btn-info my-2 ml-1">{{ trans('admin.bichao.resultados') }}</button>
        </a>
        </div>
        <div>
        <a href="{{ route('admin.bets.bichao.minhas.apostas') }}">

            <button class="btn btn-info my-2 ml-1">{{ trans('admin.bichao.minhasaposts') }}</button>
        </a>
        <a href="{{ route('admin.bets.bichao.cotacao') }}">

            <button class="btn btn-info my-2 ml-1">{{ trans('admin.bichao.cotacao') }}</button>
        </a>
        </div>
        <button data-toggle="modal" data-target="#jogos-carrinho" class="btn btn-info my-2 ml-1 position-relative">
            <i class="fas fa-shopping-cart"></i>
            @if (sizeof($chart) > 0)
            <div id="has-cart-alert" class="position-absolute rounded"
                style="background-color: red; height: 10px; width: 10px; top: -3px; right: -3px;"></div>
            @endif
            {{ trans('admin.bichao.labelCarrinho') }}
        </button>
    </div>
</div>
@include('admin.pages.bets.game.bichao.carrinho')