@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="max-w-sm rounded shadow-lg card-outline card-primary">
            <div class="flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l">
                <h1 class="text-3xl text-center font-mono font-bold mt-4">{{ __('Register') }}</h1>

                <div class="card-body">
                    <form class="f p-4" method="POST" action="{{ route('register') }}">
                        @csrf   
                        <div id="obj1">                        
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
                                
                                <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                
                            </div>                                                                                                                                                            
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                                    
                                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
                                    
                                <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-control" name="password_confirmation" required>

                            </div>                            
                            <div class="mt-2">                    
                                <button type="submit" class="w-full text-center py-3 rounded  text-white bg-blue-500 hover:bg-blue-700 focus:outline-none my-1">
                                    {{ __('Register') }}
                                </button>
                            </div>
                                                                                                                   
                    </form>                    
                </div>                
            </div>
        </div>        
    </div>
</div>
@endsection
