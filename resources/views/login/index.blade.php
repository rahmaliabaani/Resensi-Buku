@extends('layouts.main')

@section('container')
<section>
    <div class="container py-5 mt-5 mb-3">
        <div class="row pt-5">
            <div class="col-md-8 mx-auto col-lg-5">
                <form method="POST" action="/login" class="p-5 p-md-4 border rounded-3 bg-body-tertiary">
                  @csrf
                  <h3 class="fw-light text-center mb-3">Silahkan Masuk</h3>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="floatingInput">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required autocomplete="current-password">
                    <label for="floatingPassword">Password</label>
                  </div>
                  <button class="w-100 btn btn-danger" type="submit">Masuk</button>
    
                  <hr class="my-3">
                  <small class="text-body-secondary">Belum memiliki akun? <a href="/register">Klik untuk mendaftar</a></small>
                </form>
              </div>
        </div>
    </div>
</section>
@endsection