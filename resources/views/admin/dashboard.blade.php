@extends('layouts.Home')

@section('head')
    <title>Admin Dashboard</title>
@endsection

@section('content')

   <h1>Welcome to Admin Dashboard</h1>
<p>Hello {{ Auth::guard('admin')->user()->name }}!</p>

<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
@endsection
    