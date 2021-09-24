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
                    @foreach ($orderAnswer as $key=>$answers)
                        @if ($key==0)
                            {{$answers->answer}}{{" Best Vote "}}{{$answers->vote_count}}<br>
                            <a href="/vote/{{$answers->id}}/{{$content->id}}">vote</a>
                        @else
                            {{$answers->answer}}{{$answers->vote_count}}<br>
                            <a href="/vote/{{$answers->id}}/{{$content->id}}">vote</a>
                        @endif
                        
                    @endforeach
                    <form action="/detail/{{$content->id}}" method="get" class="m-3">
                        <input type="text" name="answer" class="form-control" id="">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
   
