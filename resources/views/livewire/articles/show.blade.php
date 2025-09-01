<?php

use function Livewire\Volt\{state};
use App\Models\Article;
//
state([ 'article' => fn(Article $article) => $article ]);

?>

<div>
    <a href="{{ route('articles.index') }}">戻る</a>
    <h1>{{ $article->title }}</h1>
    <p>{!! nl2br(e($article->body)) !!}</p>
</div>
