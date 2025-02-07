@extends('layout')
@section('content')
    <div class="col-md-9">
        <h1 class="text-center py-3"> Hírek</h1>
        <div class="row ">
            @foreach ($result as $sv)
                <div class="col-md-8 ">
                    <h1>{{ $sv->title }}</h1>
                    <p>{{ date_format(date_create($sv->date), 'Y. m. d.') }}</p>
                    <p>{!! $sv->text !!}</p>
                </div>
                <div class="col-md-4 ">
                    <img class="w-100 py-3" src="{{ asset('img/' . $sv->img . '') }}" alt="a">
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
