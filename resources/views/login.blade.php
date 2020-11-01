@extends('layouts.app')

@section('title', 'Login')

@section('body')
    <div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-6">
            <h1>Please login</h1>
            <form method="POST" action="/profile">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection