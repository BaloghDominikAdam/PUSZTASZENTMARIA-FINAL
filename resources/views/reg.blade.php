@extends('layout')
@section('content')
    <div class="col-md-9">
        <h1 class="text-center py-3">Regisztráció</h1>
        <form action="/reg" method="post">
            @csrf
            <div class="py-2">
                <label for="nev" id="nev" class="form-label">Név: <span class="text-danger">*</span></label>
                <input type="text" name="nev" id="nev" class="form-control" value={{ old('nev') }}>
                @error('nev')
                    <p class="text-danger"><b>{{ $message }}</b></p>
                @enderror
            </div>
            <div class="py-2">
                <label for="email" id="email" class="form-label">E-mail: <span class="text-danger">*</span></label>
                <input type="text" name="email" id="email" class="form-control" value={{ old('email') }}>
                @error('email')
                    <p class="text-danger"><b>{{ $message }}</b></p>
                @enderror
            </div>
            <div class="py-2">
                <label for="password" id="password" class="form-label">Jelszó:</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <p class="text-danger"><b>{{ $message }}</b></p>
                @enderror
            </div>
            <div class="py-2">
                <label for="password_confirmation" id="password_confirmation" class="form-label">Jelszó mégegyszer:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <p class="text-danger"><b>{{ $message }}</b></p>
                @enderror
            </div>
            <div class="py-2">
                <span class="text-danger">* kötelező megadni</span>
            </div>
            <div class="py-3">
                <button type="submit" class="btn btn-outline-primary">Regisztráció!</button>
            </div>


        </form>
    </div>
@endsection
