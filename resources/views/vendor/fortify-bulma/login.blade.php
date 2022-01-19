@extends('fortify-bulma::layout')

@section('content')
    <div class="card mt-6">
        <div class="card-header">
            <h3 class="card-header-title">{{ __('Login') }}</h3>
        </div>

        <div class="card-content">
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                    <div class="control">
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               class="input{{ $errors->has('email') ? ' is-danger' : '' }}">

                        @if($errors->has('email'))
                            <div class="help is-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>

                    <div class="control">
                        <input id="password" type="password" name="password"
                               class="input{{ $errors->has('password') ? ' is-danger' : '' }}">

                        @if ($errors->has('password'))
                            <div class="help is-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    @if (Route::has('password.request'))
                        <div class="control">
                            <a class="button is-text" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif

                    <div class="control">
                        <button type="submit" class="button is-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
