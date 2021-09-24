@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="compress/act" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" id="" class="form-control">
            <button type="submit" class="btn btn-primary">Compress</button>
        </form>
        
    </div>
@endsection