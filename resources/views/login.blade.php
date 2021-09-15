@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card" style="border-radius: 1rem">
                    <div class="card-body m-2">
                        <form action="/login-proses" method="post">
                            <div class="form-group">
                                <h1>Login</h1>
                                <hr>
                                @csrf
                                <label for="email" class="mt-4 mb-2">Email</label>
                                <input type="text" name="email" id="email" class="form-control mb-3 ">
                                <label for="pass" class="mb-2">Password</label>
                                <input type="password" name="pass" id="pass" class="form-control mb-3">
                                <button type="submit" class="btn btn-info col-12">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection