@extends('layout')
@section('content')
    <div class="col-md-9">
        <h1 class="text-center py-3">Vendégkönyv</h1>
        @if (Auth::check())
            <form action="/vendeg" method="post">
                @csrf
                <div class="py-2">
                    <label for="nev" id="nev" class="form-label">Név: <span class="text-danger">*</span></label>
                    <input type="text" name="nev" id="nev" class="form-control">
                    @error('nev')
                        <p class="text-danger"><b>{{ $message }}</b></p>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="email" id="email" class="form-label">E-mail: <span
                            class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" class="form-control">
                    @error('email')
                        <p class="text-danger"><b>{{ $message }}</b></p>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="message" id="message" class="form-label">Üzenet: <span
                            class="text-danger">*</span></label>
                    <textarea name="message" id="message" rows="6" class="form-control"></textarea>
                    @error('message')
                        <p class="text-danger"><b>{{ $message }}</b></p>
                    @enderror
                </div>
                <div class="py-2">
                    <span class="text-danger">* kötelező megadni</span>
                </div>
                <div class="py-3">
                    <button type="submit" class="btn btn-outline-primary">Beküld</button>
                </div>


            </form>
        @else
            <hr>
            <h1 class="text-center py-2"> Ha szeretne a vendégkönybe írni akkor jelentkezzen be, vagy regisztráljon!</h1>
        @endif

        <hr>
        @foreach ($result as $row)
            <div class="py-2">
                <p>{{ $row->nev }} - <a href="mailto:{{ $row->email }}">{{ $row->email }}</a></p>
                <p> {{ date_format(date_create($row->date), 'Y. m. d.') }}</p>
                <p>{{ $row->message }}</p>
            </div>
        @endforeach

    </div>
@endsection
