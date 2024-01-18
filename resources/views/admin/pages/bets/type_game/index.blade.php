@extends('admin.layouts.master')

@section('title', trans('admin.game-types.list-game-type'))

@section('content')
    <div class="row 
        <div class="col-md-12">
            @error('success')
                @push('scripts')
                    <script>
                        toastr["success"]("{{ $message }}")
                    </script>
                @endpush
            @enderror
            @error('error')
                @push('scripts')
                    <script>
                        toastr["error"]("{{ $message }}")
                    </script>
                @endpush
            @enderror
            @can('create_type_game')
                <a href="{{route('admin.bets.type_games.create')}}">
                    <button class="btn btn-info my-2">{{ trans('admin.game-types.list-game-type') }}</button>
                </a>
            @endcan
            <div class="table-responsive extractable-cel">
                <table class="table table-striped table-hover table-sm" id="type_game_table">
                    <thead>
                    <tr>
                        <th>{{ trans('admin.game-types.table-id') }}</th>
                        <th>{{ trans('admin.game-types.table-name') }}</th>
                        <th>{{ trans('admin.game-types.table-created-at') }}</th>
                        <th class="acoes">{{ trans('admin.game-types.table-actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_type_game" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ trans('admin.game-types.delete-confirm-message') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ trans('admin.exclude-game-text') }}
                </div>
                <div class="modal-footer">
                    <form id="destroy" action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.exclude-game-cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('admin.exclude-game-confirm') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script type="text/javascript">

        $(document).on('click', '#btn_delete_type_game', function () {
            var type_game = $(this).attr('type_game');
            var url = '{{ route("admin.bets.type_games.destroy", ":type_game") }}';
            url = url.replace(':type_game', type_game);
            $("#destroy").attr('action', url);
        });

        $(document).ready(function () {
            var table = $('#type_game_table').DataTable({
                language: {
                    "lengthMenu": "{{ trans('admin.pagesF.mostrandoRegs') }}",
            "zeroRecords": "{{ trans('admin.pagesF.ndEncont') }}",
            "info": "{{ trans('admin.pagesF.mostrandoPags') }}",
            "infoEmpty": "{{ trans('admin.pagesF.nhmRegs') }}",
            "infoFiltered": "{{ trans('admin.pagesF.filtrado') }}",
            "search" : "{{ trans('admin.pagesF.search') }}",
            "previous": "{{ trans('admin.pagesF.previous') }}",
            "next": "{{ trans('admin.pagesF.next') }}"
                },
                order:[0, 'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.bets.type_games.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

@endpush
