@extends('admin.layouts.master')

@section('title', trans('admin.game-types.edit-game-type'))

@section('content')

    <div class="col-md-12 p-5">
        <section class="content">
            <form action="{{route('admin.bets.type_games.update', ['type_game' => $typeGame->id])}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.pages.bets.type_game._form')
            </form>
        </section>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>

@endpush
