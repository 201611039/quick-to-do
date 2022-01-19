@extends('fortify-bulma::layout')

@section('content')
    <div class="card mt-6">
        <div class="card-header">
            <h3 class="card-header-title">{{ __('Register') }}</h3>
        </div>

        <div class="card-content">
            <form role="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="name" class="label">{{ __('Name') }}</label>

                    <div class="control">
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                               class="input{{ $errors->has('name') ? ' is-danger' : '' }}">

                        @if($errors->has('name'))
                            <div class="help is-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                    <div class="control">
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               class="input{{ $errors->has('email') ? ' is-danger' : '' }}">

                        @if ($errors->has('email'))
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
                    <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                    <div class="control">
                        <input id="password-confirm" type="password" name="password_confirmation"
                               class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}">

                        @if ($errors->has('password_confirmation'))
                            <div class="help is-danger">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <a class="button is-text" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
