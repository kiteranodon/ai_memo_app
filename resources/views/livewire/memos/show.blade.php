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

?>

<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $memo->title }}</h1>
    <div class="mb-6 whitespace-pre-line text-gray-800">
        {{ $memo->body }}
    </div>
    <div class="text-sm text-gray-500">
        作成日: {{ $memo->created_at->format('Y/m/d H:i') }}
    </div>
</div>
