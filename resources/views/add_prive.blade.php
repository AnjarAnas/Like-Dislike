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
                        <form action="/add_prive" method="post">
                            <div class="form-group">
                                @csrf
                                <label for="artikel">Judul Atikel</label>
                                <input type="text" name="judul" id="artikel" class="form-control">
                                <label for="artikel">Body Atikel</label>
                                <select name="role" id="tags" class="form-select">
                                    @foreach ($role as $t)<option value='{{$t->id}}'>{{$t->name}}</option>@endforeach
                                </select>
                                <label for="artikel">Pilih Tag Atikel</label>
                                <li>
                                    <ul>
                                        <div id="ftags">
                                            <select name="menu[]" id="tags" class="form-select">
                                                @foreach ($menu as $t)<option value='{{$t->id}}'>{{$t->menu}}</option>@endforeach
                                            </select>
                                            <select name="submenu[]" id="tags" class="form-select">
                                                @foreach ($submenu as $t)<option value='{{$t->id}}'>{{$t->sub_menu}}</option>@endforeach
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
        var i=0;
        $("#tambahTags").click(function (e) { 
            e.preventDefault();
            // var mainForm=$();
            var menu="<select name='menu[]' id='menu"+i+"' class='form-select mt-3'>@foreach ($menu as $t)<option value='{{$t->id}}'>{{$t->menu}}</option>@endforeach</select>";
            var subMneu="<select name='submenu[]' id='menu"+i+"' class='form-select mt-3'>@foreach ($submenu as $t)<option value='{{$t->id}}'>{{$t->sub_menu}}</option>@endforeach</select>";
            //console.log(mainForm);
            i++;
            console.log(i);
            $("#ftags").append(menu);
            $("#ftags").append(subMneu);
        });
    </script>
@endsection