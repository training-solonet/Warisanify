<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ url('css/register.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Scheherazade+New:wght@400;700&display=swap" rel="stylesheet" />
  <title>Register</title>
</head>

<body class="">
  <div class="container-fluid">
    <div class="row vh-100">
      <div class="left col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
        <form method="POST" action="{{ route('register') }}" class="form container col-md-12 col-lg-8">
            @csrf
          {{-- <x-jet-validation-errors class="mb-4" /> --}}
          <div class="mb-3">
            <label for="username" value="{{ __('username') }}">Username</label>
            <input type="text" name="username" required autofocus autocomplete="username" class="form-control p-md-2 @error('username') is-invalid
                @enderror" id="username" bootstrap-overrides" aria-describedby="emailHelp" value="{{ old('username') }}"/>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control p-md-2 @error('password') is-invalid
            @enderror" id="password" required autocomplete="new-password"/>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label" value="{{ __('Confirm Password') }}">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control p-md-2 @error('password_confirmation') is-invalid
                @enderror" id="password_confirmation" required autocomplete="new-password"/>
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <input type="hidden" value="user" name="role" class="form-control p-md-2"/>
          </div>

          @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <button type="submit" name="submit" class="btn w-100 btn-primary">
                {{-- <x-jet-button class="ml-1"> --}}
                    {{ __('Register') }}
                </button>
                {{-- </x-jet-button> --}}
                <a class="underline text-sm text-gray-100 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

        </form>
      </div>
      <div class="right col-md-6 col-lg-6 bg-primary"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
