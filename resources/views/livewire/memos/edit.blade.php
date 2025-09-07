<?php

use function Livewire\Volt\{state, rules, mount};
use App\Models\Memo;

/**
 * メモ更新画面（memos.edit）
 */

// フォーム状態の管理
state([
    'memo' => null,
    'title' => '',
    'body' => '',
]);

// バリデーションルール
rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
]);

// コンポーネントマウント時にメモデータを取得
mount(function (Memo $memo) {
    $this->memo = $memo;
    $this->title = $memo->title;
    $this->body = $memo->body;
});

// メモ更新処理
$update = function () {
    $this->validate();

    $this->memo->update([
        'title' => $this->title,
        'body' => $this->body,
    ]);

    $this->redirect(route('memos.show', $this->memo));
};

?>

<div class="max-w-2xl mx-auto mt-10 p-6">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">メモ編集</h1>

    <form wire:submit="update" class="space-y-6">
        <!-- タイトル入力 -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                タイトル
            </label>
            <input type="text" id="title" wire:model="title"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                placeholder="メモのタイトルを入力してください">
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- 本文入力 -->
        <div>
            <label for="body" class="block text-sm font-medium text-gray-700 mb-2">
                本文
            </label>
            <textarea id="body" wire:model="body" rows="10"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('body') border-red-500 @enderror"
                placeholder="メモの内容を入力してください"></textarea>
            @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- 送信ボタン -->
        <div class="flex justify-between items-center">
            <a href="{{ route('memos.show', $memo) }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                ← メモ詳細に戻る
            </a>
            <div class="flex space-x-4">
                <a href="{{ route('memos.show', $memo) }}"
                    class="px-4 py-2 text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors">
                    キャンセル
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    更新
                </button>
            </div>
        </div>
    </form>
</div>
