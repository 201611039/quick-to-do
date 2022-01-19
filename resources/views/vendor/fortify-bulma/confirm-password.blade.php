@extends('fortify-bulma::layout')

@section('content')
    <div class="card mt-6">
        <div class="card-header">
            <h3 class="card-header-title">{{ __('Confirm Password') }}</h3>
        </div>

        <div class="card-content">
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>

                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror"
                               name="password" required autocomplete="current-password">

                        @error('password')
                        <div class="help is-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-primary">
                            {{ __('Confirm Password') }}
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="control">
                            <a class="button is-text" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
