@extends('admin.layouts.login')

@section('title', 'Login')

@section('content')

  <div class="col-lg-4 col-md-12 mt-5">
  <div class="login-logo">

            <img src="{{ App\Helper\Configs::getConfigLogo() }}" alt=""  width=150 height=150>

        </div>

         @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body login-card-body">
                <div class="col-md-12 px-4">
                    @error('success')
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    @error('error')
                    <div class="alert alert-default-danger alert-dismissible fade show">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                </div>
                <h3 class="login-box-msg">{{ trans('admin.pagesF.recSenha') }}</h3>
                  
                @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <center>
                    <form id="formulario" action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        @if (!Session::has('message'))
                        <p>{{ trans('admin.pagesF.envLink') }}</p>
                        <div class="form-group row">
                            <div class="col-md-12">
                            
                                <input placeholder="Seu Email:" type="text" id="email_address" class="form-control" name="email" required autofocus>
                            @endif
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        @if (!Session::has('message'))
                            <button type="submit" class="btn btn-primary" id="botao">
                            {{ trans('admin.pagesF.enviar') }}
                            </button>
                        @endif
                    </form>
                </center>             

            </div>
        </div>
    </div>
@endsection