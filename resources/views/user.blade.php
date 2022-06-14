@extends('main_layout')

@section('content')
    <div class="col-10" style="margin: 0 auto">
        <p>{{ $user->id }}</p>
        <p>{{ $user->name }}</p>
        <p>{{ $user->surname }}</p>
        <p>{{ $user->email }}</p>
    </div>
@endsection
