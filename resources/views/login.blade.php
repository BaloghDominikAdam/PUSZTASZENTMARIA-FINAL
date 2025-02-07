@extends('layout')
@section('content')
    <div class="container py-3 fs-5 col-md-9">
        @error('sv')
            <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror
        <div class="card mx-auto" style="width: 35rem">
            <div class="card-body">
                <form action="/login" method="post">
                    <h1 class="text-center display-5">Bejelentkezés</h1>
                    @csrf
                    <div class="py-2">
                        <label for="nev" class="form-label">Név: </label>
                        <input type="text" name="nev" id="nev" class="form-control">
                        @error('nev')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="password" class="form-label">Jelszó: </label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary w-100 " type="submit">Bejelentkezés!</button>
                    </div>




                </form>
            </div>
        </div>




    </div>
@endsection
