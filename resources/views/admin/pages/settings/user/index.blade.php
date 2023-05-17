@extends('admin.layouts.master')

@section('title', 'Usuários')

@section('content')
    <div class="row bg-white p-3">
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
            @can('create_user')
                <a href="{{route('admin.settings.users.create')}}">
                    <button class="btn btn-info my-2">{{ trans('admin.indexUser.new-user') }} </button>

                </a>
            @endcan
            <div class="table-responsive extractable-cel">
                <table class="table table-striped table-hover table-sm" id="user_table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('admin.indexUser.name') }}  </th>
                        <th>{{ trans('admin.indexUser.email') }} </th>
                        <th>DDD</th> 
                        <th>{{ trans('admin.indexUser.phone') }} </th> 
                        <th>{{ trans('admin.indexUser.creation') }} </th>
                        <th class="acoes">{{ trans('admin.indexUser.action') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_user" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ trans('admin.indexUser.delete-user') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {{ trans('admin.indexUser.revert-action') }} 
                </div>
                <div class="modal-footer">
                    <form id="destroy" action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.indexUser.cancel') }} </button>
                        <button type="submit" class="btn btn-danger">{{ trans('admin.indexUser.delete') }} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script type="text/javascript">

        $(document).on('click', '#btn_delete_user', function () {
            var user = $(this).attr('user');
            var url = '{{ route("admin.settings.users.destroy", ":user") }}';
            url = url.replace(':user', user);
            $("#destroy").attr('action', url);
        });

        $(document).ready(function () {
            var table = $('#user_table').DataTable({
                language: {
                    "lengthMenu": "{{ trans ('admin.language.lengthMenu') }}",
                    "zeroRecords": "{{ trans ('admin.language.zeroRecords') }}",
                    "info": "{{ trans ('admin.language.info') }}",
                    "infoEmpty":  "{{ trans ('admin.language.infoEmpty') }}",
                    "infoFiltered": "{{ trans ('admin.language.infoFiltered') }}",
                    "search": "{{ trans ('admin.language.search') }}",
                "paginate": {
                    "next": "{{ trans ('admin.language.next') }}",
                    "previous": "{{ trans ('admin.language.previous') }}"
                }
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.settings.users.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'ddd', name: 'ddd'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
        
    </script>
   
    

@endpush
