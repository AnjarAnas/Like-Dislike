<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class APILikeController extends Controller
{
    public function like($id){
        $like=Like::where('content_id',$id)->get();
        if($like->isEmpty()){
            Like::create([
                'content_id'=>$id,
                'like'=>1
            ]);
            $likeResult=Like::where('content_id',$id)->first();
            return response()->json(['success'=>1,'message'=>'like telah ditambahkan','like'=>$likeResult->like]);
        }else{
            Like::where('content_id',$id)->update([
                
                'like'=>$like[0]->like+1
            ]);
            $likeResult=Like::where('content_id',$id)->first();
            return response()->json(['success'=>1,'message'=>'like telah ditambahkan','like'=>$likeResult->like]);
        }
        
    }
    public function dislike($id){
        $like=like::where('content_id',$id)->get();
        if($like->isEmpty()){
            return response()->json(['success'=>0,'message'=>'Harus Like Dahulu']);
        }else{
            if($like[0]->like<=0){
                return response()->json(['success'=>0,'message'=>'Nilai Tidak Boleh kurang dari 0']);
            }else{
                Like::where('content_id',$id)->update([
                
                    'like'=>$like[0]->like-1
                ]);
                $likeResult=Like::where('content_id',$id)->first();
                return response()->json(['success'=>1,'message'=>'dislike telah ditambahkan','like'=>$likeResult->like]);
            }
            
        } 
    }
    public function post(Request $req){
        return response()->json(['data'=>$req->all()]);
    }
}
