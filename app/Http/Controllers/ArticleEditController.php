<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $article = $user->article()->orderBy('updated_at', 'ASC')->paginate();
        return view('edits', compact('user', 'article'));
    }

}
