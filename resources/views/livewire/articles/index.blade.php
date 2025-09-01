<?php

use function Livewire\Volt\{state};
use App\Models\Article;

state([ 'articles' => fn() => Article::all()]);

$create = function () {
    redirect()->route('articles.create');
};

?>

<div>
    <h1>論文一覧</h1>
    <ul>
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('articles.show', $article->id) }}">
                    {{ $article->title }}
                </a>
            </li>
        @endforeach
    </ul>

    <button wire:click="create">新規論文投稿</button>
</div>
