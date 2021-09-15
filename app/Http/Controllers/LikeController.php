<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(){
        $content=Content::get();
        // dd($content);
        //dd($content[0]->dislike->l)
        return view('tampilcontent',['content'=>$content]);
    }
    public function like($id){
        $like=Like::where('content_id',$id)->get();
        if($like->isEmpty()){
            Like::create([
                'content_id'=>$id,
                'like'=>1
            ]);
        }else{
            Like::where('content_id',$id)->update([
                
                'like'=>$like[0]->like+1
            ]);
        }
        
        return redirect('/');
    }
    public function dislike($id){
        $like=like::where('content_id',$id)->get();
        if($like->isEmpty()){
            
        }else{
            if($like[0]->like<=0){

            }else{
                Like::where('content_id',$id)->update([
                
                    'like'=>$like[0]->like-1
                ]);
            }
            
        }
            
        
        return redirect('/');
    }
    
}
