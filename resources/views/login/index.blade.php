@extends('layouts.main');

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

        <main class="form-signin w-100 m-auto">
            <form action="/login" method="POST">
              @csrf
              {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
              <h2 class="h3 mb-3 fw-normal text-center">Please sign in</h2>
          
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="email" placeholder="email" required value="{{  old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{  $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{  $message }}
                    </div>
                @enderror
              </div>
          
              {{-- <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember me
                </label>
              </div> --}}
              <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            </form>
            <small class="d-block text-center mt-3">not register ? <a href="/register" class="text-decoration-none">Register now!</a></small>
            {{-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p> --}}
          </main>
    </div>
</div>
@endsection