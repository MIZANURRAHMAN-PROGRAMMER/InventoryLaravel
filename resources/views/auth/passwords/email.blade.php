@extends('layouts.app')

@section('content')

<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">

        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white"> Reset Password </h3>
        </div>

        <div class="panel-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
         <form method="POST" action="{{ route('password.email') }}" role="form" class="text-center">
            @csrf
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Enter your <b>Email</b> and instructions will be sent to you!
            </div>
            <div class="form-group m-b-0">
                <div class="input-group">
                    <input type="email" class="form-control input-lg" placeholder="Enter Email"  name="email" value="{{ old('email') }}" required>

                    <span class="input-group-btn"> <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">Reset</button> </span>
                </div>
            </div>

        </form>

        </div>

    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
