<?php

use function Livewire\Volt\{state, with};
use App\Models\Memo;

/**
 * メモ一覧画面（memos.index）
 */

// メモ一覧データの取得
with(function () {
    return [
        'memos' => Memo::orderBy('created_at', 'desc')->get(),
    ];
});

?>

<div class="max-w-4xl mx-auto mt-10 p-6">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">メモ一覧</h1>
        <a href="{{ route('memos.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
            新規作成
        </a>
    </div>

    @if ($memos->count() > 0)
        <div class="grid gap-4">
            @foreach ($memos as $memo)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow">
                    <a href="{{ route('memos.show', $memo) }}" class="block">
                        <h2 class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
                            {{ $memo->title }}
                        </h2>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">メモがありません</p>
        </div>
    @endif
</div>
