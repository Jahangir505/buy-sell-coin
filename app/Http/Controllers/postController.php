<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\article;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    static function display($key="",$val="",Request $request)
    {

        $page=($request->page)?(int)$request->page:1;

        $cat = DB::select('select * from posts_categorie', [1]);

        if($key=="cat")
        {
            $posts=DB::select('select * from posts where cat_id in (select cat_id from posts_categorie where name=?)', [$val]);
            $count=DB::select('select count(*) as number from posts where cat_id in (select cat_id from posts_categorie where name=?)', [$val])[0]->number;
        }

        elseif($key=="search")
        {
            $word=$_POST["word"];

            $posts=DB::select('select * from posts where excerpt like ? or title like ?', ["%$word%","%$word%"]);

            $count=DB::select('select count(*) as number from posts where excerpt like ? or title like ?', ["%$word%","%$word%"])[0]->number;
        }

        else{
            $posts=Post::paginate(15);

            $count=Post::count();
        }

        

        return view('blog/index',["posts"=>$posts,'cat'=>$cat,"page"=>$page,"count"=>$count]);
    }

    static function single($id)
    {
        
        $cat = DB::select('select * from posts_categorie', [1]);

        $single=Post::where("id",$id)->first();
        
        
        $same=DB::select('select * from posts where cat_id=? and id!=?', [$single->cat_id,$id]);
        
        

        return view('blog/post',["post"=>$single,'cat'=>$cat, "same"=>$same]);
    }

    
}