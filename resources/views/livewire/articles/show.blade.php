<?php

use function Livewire\Volt\{state};
use App\Models\Article;
//
state([ 'article' => fn(Article $article) => $article ]);

// 編集ページにリダイレクト
$edit = function () {
    return redirect()->route('articles.edit', $this->article);
};

$destroy = function () {
    $this->article->delete();
    return redirect()->route('articles.index');
};

?>

<div>
    
    <h1>{{ $article->title }}</h1>
    <p>{!! nl2br(e($article->body)) !!}</p>

    <a href="{{ route('articles.index') }}"><button wire:click="backToIndex">一覧へ戻る</button></a>
    <button wire:click="edit">編集する</button>
    <button wire:click="destroy" onclick="return confirm('削除しますか？')">削除する</button>
</div>
