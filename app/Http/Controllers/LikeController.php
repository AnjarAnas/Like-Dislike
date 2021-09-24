<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\ArtikelTags;
use App\Models\Content;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\tags;
use App\Models\View;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index(){
        // $getContent=Content::where('id',$id)->first();
        // $jumlahView=;
        $content=Content::with('artikeltag')->get();
        //dd($content)
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
    public function addArtikel(){
        $tags=tags::get();
        return view('add_artikel',['tags'=>$tags]);
    }
    public function add(Request $req){
        $storeArtikel=Content::create([
            'judul'=>$req->judul,
            'body'=>$req->body
        ]);
        $getArtikelId=Content::where('judul',$req->judul)->first();
        //dd($getArtikelId->id);
        if($storeArtikel){
            foreach($req->tag as $tags){

                ArtikelTags::create([
                    'tag_id'=>$tags,
                    'content_id'=>$getArtikelId->id
                ]);
            }
        }
        
    }
    public function detail($id,Request $req)
    {
        if($req->answer){
            $storeAnswer=Answer::create([
                'content_id'=>$id,
                'answer'=>$req->answer,
                
            ]);
            if($storeAnswer){
                return redirect('/detail/'.$id);
            }
        }
        View::create([
            'user_id'=>Auth::user()->id,
            'content_id'=>$id
        ]);
        
        $getContent=Content::where('id',$id)->first();
        $getAnswer=Answer::where('content_id',$id)->orderBy('vote_count','desc')->get();
        // dd($getAnswer);
        $jumlahView=$getContent->view;
        
        return view('detail',['content'=>$getContent,'jumlah'=>$jumlahView,'orderAnswer'=>$getAnswer]);
    }
    public function vote($id,$content_id)
    {
        $getAnswer=Answer::where('id',$id)->first();
        $update=Answer::where('id',$id)->update([
            'vote_count'=>$getAnswer->vote_count+1
        ]);
        $createVote=Vote::create([
            'user_id'=>Auth::user()->id,
            'answer_id'=>$id
        ]);
        if($update && $createVote){
            return redirect('/detail/'.$content_id);
        }
        // dd($getAnswer);
    }
    
}
