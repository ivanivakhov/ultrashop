@extends('layouts.auth')

@section('content')
    @auth
        <form action="{{ route('logout') }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit">Log out</button>
        </form>
    @endauth
@endsection
