@extends('layout')
@section('content')
    <div class="container py-3 fs-5 col-md-9">
        <h1 class="text-center display-5">Szia, {{ Auth::user()->nev }} !</h1>

        <p><b>Email:</b> <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>
        <p><b>Regisztráció dátuma:</b> {{ date_format(date_create(Auth::user()->created_at), 'Y. m. d.') }}
        <p><b>Jelszó módosítás dátuma: </b> {{ date_format(date_create(Auth::user()->updated_at), 'Y. m. d.') }} <a
                class="btn btn-primary" href="/newpass">Jelszó módosítás</a></p>
        <p><a class="btn btn-danger" href="/logout">Kilépés</a></p>
    </div>
@endsection
