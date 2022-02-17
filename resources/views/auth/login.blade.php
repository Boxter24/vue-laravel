@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 card-outline card-primary">
                <div class="mt-4 mb-2 font-mono font-bold text-4xl text-center">{{ __('Login') }}</div>
                <div class="card-body">                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail') }}</label>                            
                            <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group row">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>                            
                            <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3"></div>                                                               
                                <label class="md:w-2/3 block text-gray-500 font-bold" for="remember">
                                    <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </label>                            
                        </div>

                        <div class="flex items-center justify-between">                            
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
