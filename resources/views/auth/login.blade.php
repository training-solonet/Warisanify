<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ url('css/login.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Scheherazade+New:wght@400;700&display=swap" rel="stylesheet" />
  <title>Login</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row vh-100">
      <div class="left col-md-6 col-lg-6 bg-primary"></div>

      <div class="right col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
        <!-- start-form -->
        <form class="form container col-md-12 col-lg-8" method="POST" action="{{ route('login') }}">
            @csrf
          <div class="mb-3">
            <label for="Username" class="form-label">Username</label>
            <input type="text" name="username" :value="old('username')" class="form-control p-md-2 @error('username') is-invalid
            @enderror" id="Username" aria-describedby="emailHelp" />
            @error('username')
                {{ $message }}
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control p-md-2 @error('password') is-invalid
            @enderror" id="password" required autocomplete="current-password"/>
            @error('password')
                {{ $message }}
            @enderror
          </div>
          <div class="mb-3 form-check">
            <input type="hidden" name="role" value="user" class="form-check-input" id="exampleCheck1">
          </div>
            <div class="flex items-center justify-end">
                {{-- <x-jet-button class="ml-4"> --}}
                <button type="submit" name="submit" class="btn w-100 btn-primary">
                    {{ __('Login') }}
                </button>
                {{-- </x-jet-button> --}}
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    <p>Don't have an account?<a href="/register">Register</a></p>
                @endif
            </div>

            <div class="block mt-2  ">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
        </form>
        <!-- end-form -->


      </div>
    </div>
  </div>
</body>

</html>
