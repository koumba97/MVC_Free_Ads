@extends('layouts.app')

@section('content')
<form method="post" action="update">
    @csrf


    <input type="text" name="name"  value="{{ Auth::user()->name }}" />

    <input type="email" name="email"  value="{{ Auth::user()->email }}" />

    <input type="password" name="password" />

    <input type="password" name="password_confirmation" />

    <button type="submit">Send</button>
</form>
@endsection