<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Repositories\ArticleRepository;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //flash('Welcome Aboard!','danger')->important();
    /*    $articleModel = app('App\Repositories\ArticleRepository');
        $articles = $articleModel->getInitArticles(20);
        $hotArticles = $articleModel->getRecentArticles(5);
        $themes = app('App\Repositories\ThemeRepository')->getTagsWithFilter('hot',['*'],30);*/

       /* \DB::enableQueryLog();

        dd( \DB::getQueryLog());*/

        return view('pages.home');
    }

   /* public function explore($filter= 'default'){
        $filter = explode('-',trim($filter));

        $topics = app('App\Repositories\TopicRepositories')->fetchTopicsWithFilter($filter);
        $hotTopics = app('App\Repositories\TopicRepositories')->fetchThreeHot(5);
        return view('explore',compact('topics','filter','hotTopics'));
    }*/


    /*public function square(){
        $focusIds = [];
        if (Auth::check()){
            $focusIds = app('App\Repositories\ThemeRepository')->fetchFocusId(Auth::id());
        }
        $themes = app('App\Repositories\ThemeRepository')->fetchThemesWithTopics(6,2);
        $hotThemes = app('App\Repositories\ThemeRepository')->fetchHotThemes(10);
        return view('square', compact('themes', 'focusIds', 'hotThemes'));
    }*/
}
