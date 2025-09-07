<?php

use function Livewire\Volt\{state, mount};
use App\Models\Memo;

/**
 * メモ詳細画面（memos.show）
 */

// メモデータの状態管理
state(['memo' => null]);

// コンポーネントマウント時にメモデータを取得
mount(function (Memo $memo) {
    $this->memo = $memo;
});

// メモ削除処理
$delete = function () {
    $this->memo->delete();
    $this->redirect(route('memos.index'));
};

?>

<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <div class="flex justify-between items-start mb-4">
        <h1 class="text-2xl font-bold">{{ $memo->title }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('memos.edit', $memo) }}"
                class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors">
                編集
            </a>
            <button wire:click="delete" wire:confirm="このメモを削除しますか？"
                class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition-colors">
                削除
            </button>
        </div>
    </div>
    <div class="mb-6 whitespace-pre-line text-gray-800">
        {{ $memo->body }}
    </div>
    <div class="text-sm text-gray-500">
        作成日: {{ $memo->created_at->format('Y/m/d H:i') }}
    </div>
    <div class="mt-6">
        <a href="{{ route('memos.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors">
            ← メモ一覧に戻る
        </a>
    </div>
</div>
