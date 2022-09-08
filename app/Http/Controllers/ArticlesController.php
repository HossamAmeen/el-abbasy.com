<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id)
    {
        $page = Page::where('model_name', 'article')->get()->first();
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $article = Article::find($id);
        $video = "";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $article = $article->load('translations');
       // $article_category = ArticleCategory::find($id);
        // dd($id);
        return view('article_details', ['article' => $article ,'url'=>$url , 'page'=> $page, 'video'=>$video ]);
    }
}
