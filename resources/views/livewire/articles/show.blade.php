<?php

use function Livewire\Volt\{state};
use App\Models\Article;
// ルートモデルバインディング
state([ 'article' => fn(Article $article) => $article ]);

// 論文の一覧表示へリダイレクト
$index = function () {
    return redirect()->route('articles.index');
};

// 編集ページにリダイレクト
$edit = function () {
    return redirect()->route('articles.edit', $this->article);
};

// 論文を削除
$destroy = function () {
    $this->article->delete();
    return redirect()->route('articles.index');
};

?>

<div>
    
    <h1>論文詳細</h1>
    <p>タイトル：{{ $article->title }}</p>
    <p>{!! nl2br(e($article->body)) !!}</p>

    <a href="{{ route('articles.index') }}"><button>一覧へ戻る</button></a>
    <button wire:click="edit">編集する</button>
    <button wire:click="destroy" onclick="return confirm('削除しますか？')">削除する</button>
</div>
