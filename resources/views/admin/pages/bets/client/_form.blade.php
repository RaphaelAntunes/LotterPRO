<div class="row">
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
    </div>
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header indica-card">
                <h3 class="card-title">{{ trans('admin.customers.new-customer-page-title') }}</h3>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">{{ trans('admin.register.name-label') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name"
                               maxlength="50" value="{{old('name', $client->name ?? null)}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">{{ trans('admin.register.last-name-label') }}</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                               name="last_name"
                               maxlength="100" value="{{old('last_name', $client->last_name ?? null)}}">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Cpf</label>
                        <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf"
                               name="cpf"
                               maxlength="50" value="{{old('cpf', $client->cpf ?? null)}}">
                        @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{ trans('admin.register.phone-label') }}</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                               name="phone"
                               maxlength="100"
                               value="{{old('phone', isset($client->phone) && !empty($client->phone) ? $client->ddd.$client->phone : null) }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">{{ trans('admin.register.email-label') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email"
                           maxlength="100" value="{{old('email', $client->email ?? null)}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                       {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="type_account">{{ trans('admin.customers.account-type-label') }}</label>
                        <select class="custom-select @error('type_account') is-invalid @enderror" name="type_account" id="type_account">
                            <option value="" @if(!isset($client)) selected @endif>{{ trans('admin.select') }}</option>
                            <option value="1" @if(isset($client) && $client->type_account == 1) selected @endif>{{ trans('admin.trade-account') }}</option>
                            <option value="2" @if(isset($client) && $client->type_account == 2) selected @endif>{{ trans('admin.savings-account') }}</option>
                        </select>
                        @error('type_account')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank">{{ trans('admin.bank') }}</label>
                        <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank"
                               name="bank"
                               maxlength="50" value="{{old('bank', $client->bank ?? null)}}">
                        @error('bank')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>                    
                </div>
                <div class="form-row">               
                    <div class="form-group col-md-6">
                        <label for="agency">{{ trans('admin.agency') }}</label>
                        <input type="text" class="form-control @error('agency') is-invalid @enderror" id="agency"
                               name="agency"
                               maxlength="50" value="{{old('agency', $client->agency ?? null)}}">
                        @error('agency')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="account">{{ trans('admin.bank-account') }}</label>
                        <input type="text" class="form-control @error('account') is-invalid @enderror" id="account"
                               name="account"
                               maxlength="50" value="{{old('account', $client->account ?? null)}}">
                        @error('account')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="pix">Pix</label>
                        <input type="text" class="form-control @error('pix') is-invalid @enderror" id="pix"
                               name="pix"
                               maxlength="50" value="{{old('pix', $client->pix ?? null)}}">
                        @error('pix')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                {{--                <div class="form-row">--}}
                {{--                    <div class="form-group col-md-6">--}}
                {{--                        <label for="password">{{ trans('admin.clientForm.password') }} </label>--}}
                {{--                        <input type="password" class="form-control @error('password') is-invalid @enderror"--}}
                {{--                               id="password" name="password"--}}
                {{--                               maxlength="15">--}}
                {{--                        @if(Route::currentRouteName() == 'admin.settings.users.edit')--}}
                {{--                            <small>{{ trans('admin.clientForm.write') }} </small>--}}
                {{--                        @endif--}}
                {{--                        @error('password')--}}
                {{--                        <span class="invalid-feedback" role="alert">--}}
                {{--                            {{ $message }}--}}
                {{--                        </span>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}
                {{--                    <div class="form-group col-md-6">--}}
                {{--                        <label for="confirm_password">{{ trans('admin.clientForm.confirm') }} </label>--}}
                {{--                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"--}}
                {{--                               id="password_confirmation"--}}
                {{--                               name="password_confirmation" maxlength="15">--}}
                {{--                        @error('password_confirmation')--}}
                {{--                        <span class="invalid-feedback" role="alert">--}}
                {{--                           {{ $message }}--}}
                {{--                        </span>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <a href="{{route('admin.bets.clients.index')}}">
            <button type="button" class="btn btn-block btn-outline-secondary">{{ trans('admin.back-to-main-page') }} </button>
        </a>
    </div>
    <div class="col-md-6 mb-3">
        <button type="submit"
                class="btn btn-block btn-outline-success">@if(request()->is('admin/bets/clients/create')) {{ trans('admin.customers.register-client') }}
              @else  {{ trans('admin.customers.edit-client') }} @endif </button>
    </div>
</div>


@push('scripts')

    <script src="{{asset('admin/layouts/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#cpf').inputmask("999.999.999-99");
            $('#phone').inputmask("(99) 9999[9]-9999");
        });
    </script>

@endpush
