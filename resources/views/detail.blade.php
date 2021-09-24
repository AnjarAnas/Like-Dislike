@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20%">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        {{$content->judul}}
                    </div>
                    <div class="card-body">
                        {{"Total Views ".count($jumlah)}}<br>
                        {{$content->body}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
   
