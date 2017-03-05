<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 16-12-23
 * Time: 下午8:19
 */

namespace App\Repositories;


use App\Models\Article;

use App\Models\Theme;
use Laracasts\Flash\Flash;

class ArticleRepository{

    protected $article;
    public function __construct(Article $article){
        $this->article = $article;
    }

    public function create($data, $themes){
        $article = Article::create($data);
        if (!$article){
            return redirect('/');
        }
        $article->themes()->attach($themes);
        Theme::find($themes)->map(function ($theme){
            $theme->increment("article_count", 1);
        });

        flash('恭喜你，发表文章成功...', 'success')->important();
        return redirect()->route('articles.show', $article->id);
    }

    public function getInitArticles($count = 10){
        return $this->article->with('user','themes')->recent()->paginate($count);
    }

    public function getRecentArticles($count = 10){
        return $this->article->with('user','themes')->recentDays()->vote()->paginate($count);
    }

    public function getArticlesWithFilter($filter, $count =20){
        return $this->article->applyFilter($filter)->recent()->paginate($count);
    }

    public function getArticleByThemesWithFilter(array $themes, $filter = 'default', $count = 20){
        return $this->article->applyFilter($filter)->joinThemesFind($themes)->recent()->paginate($count);
    }

    public function getArticlesForUser($id, $count){
        return $this->article->where('user_id', $id)->recent()->paginate($count);
    }

}