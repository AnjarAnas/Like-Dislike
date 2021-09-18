@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Tambah Artikel
                    </div>
                    <div class="card-body">
                        <form action="/add" method="post">
                            <div class="form-group">
                                @csrf
                                <label for="artikel">Judul Atikel</label>
                                <input type="text" name="judul" id="artikel" class="form-control">
                                <label for="artikel">Body Atikel</label>
                                <textarea type="text" name="body" id="artikel" class="form-control mb-3"> </textarea>
                                <label for="artikel">Pilih Tag Atikel</label>
                                <li>
                                    <ul>
                                        <div id="ftags">
                                            <select name="tag[]" id="tags" class="form-select">
                                                @foreach ($tags as $t)
                                                    <option value="{{$t->id}}">{{$t->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-info mt-2" id="tambahTags" >Tambah Tags</button>
                                    </ul>
                                    
                                </li>
                                
                                <button class="btn btn-info col-12" type="submit">Masukan</button>
    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $("#tambahTags").click(function (e) { 
            e.preventDefault();
            // var mainForm=$();
            var content="<select name='tag[]' id='tags' class='form-select mt-3'>@foreach ($tags as $t)<option value='{{$t->id}}'>{{$t->nama}}</option>@endforeach</select>";
            //console.log(mainForm);
            $("#ftags").append(content);
        });
    </script>
@endsection