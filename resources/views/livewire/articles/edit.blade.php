<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Article;

// フォームの状態を管理
state(['article', 'title', 'body']);

// ルートモデルバインディングはmountでまとめて行う
mount(function (Article $article) {
    $this->article = $article;
    $this->title = $article->title;
    $this->body = $article->body;
});

// バリデーションルール
rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:5000',
]);

$update = function () {
    $this->validate();
    $this->article->update($this->all());
    return redirect()->route('articles.show', $this->article);
};
// メモを更新する関数
?>

<div>
    <h1>投稿論文編集</h1>

    <!-- wire:submit="update"でフォーム送信時にupdate関数を呼び出し -->
    <form wire:submit="update">
        <p>
            <label for="title">論文タイトル</label>
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label>
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="body"で入力値とコンポーネントの状態($this->body)を自動的に同期 -->
            <textarea wire:model="body" id="body"></textarea>
        </p>

        <button type="submit">更新</button>
    </form>
</div>
