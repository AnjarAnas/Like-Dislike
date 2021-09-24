<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ImageCompress extends Controller
{
    public function index(){
        return view('com');
    }
    public function com(Request $req){
        //dd($req->file('file'));
        $img = Image::make($req->file('file'))->resize(1000, 1000);
        $img->save('image/'.$req->file('file')->getClientOriginalName());
        return $img->response('jpg');
    }
}
