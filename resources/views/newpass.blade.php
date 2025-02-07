@extends('layout')
@section('content')
    <div class="container py-3 fs-5 col-md-9">
        <h1 class="text-center display-5">Jelszó módosítás</h1>
        @error('sv')
            <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror
        <div class="card mx-auto" style="width: 35rem">
            <div class="card-body">
                <form action="/newpass" method="post">
                    @csrf
                    <div class="py-2">
                        <label for="oldpassword" class="form-label">Régi jelszó: </label>
                        <input type="password" name="oldpassword" id="oldpassword" class="form-control">
                        @error('oldpassword')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="newpassword" class="form-label">Jelszó: </label>
                        <input type="password" name="newpassword" id="newpassword" class="form-control">
                        @error('newpassword')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="newpassword_confirmation" class="form-label">Jelszó mégegyszer: </label>
                        <input type="password" name="newpassword_confirmation" id="newpassword_confirmation"
                            class="form-control">
                        @error('newpassword_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary w-100 " type="submit">Jelszó módosítása</button>
                    </div>




                </form>
            </div>
        </div>

    </div>
@endsection
