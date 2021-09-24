<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <style>
        a{
            text-decoration: none;
            color: black

        }
        a:hover{
            
            color: black
            
        }
    </style> --}}
</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="card">
                <div class="card-header">
                    Content
                </div>
                <div class="card-body">
                    <a href="/add/artikel" class="btn btn-success m-3">Tambah Artikel</a>
                    @foreach ($content as $c)
                   
                    <div class="card">
                        <a href="detail/{{$c->id}}" style="text-decoration: none; color:black">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($c->artikeltag as $key=>$a)
                                        @php
                                            $getTag=\App\Models\tags::where('id',$a->tag_id)->first();
                                            echo $getTag->nama;
                                        @endphp
                                        
                                        @endforeach
                                        
                                    </div>
                                </div>
                            @if($c->view)
                                {{$c->view->count()." Views"}}<br>
                                @endif
                                <hr>
                                {{$c->judul}}<br>
                                {{$c->body}}<br>
                                <a href="/like/{{$c->id}}" class="m-3">Like</a>@php
                                    $like=\App\Models\Like::where('content_id',$c->id)->get();
                                    if ($like->isEmpty()) {
                                        
                                    }else {
                                        echo $c->like->like;
                                    }
                                @endphp
                                <a href="/dislike/{{$c->id}}">Dislike</a>
                                
                            </div>
                        </a>
                    </div>
                   
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>