@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Content
            </div>
            <div class="card-body">
                <a href="/add/prive" class="btn btn-success m-3">Tambah Hak Akses</a>
                @foreach ($priv as $c)
                    <div class="card">
                        <div class="card-body">
                            {{$c->menu}}
                        </div>
                    </div>
                
               
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection