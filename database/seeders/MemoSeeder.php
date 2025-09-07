<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // サンプルデータ（user_idは1固定）
        $samples = [
            [
                'id' => 1,
                'user_id' => 1,
                'title' => 'PHP',
                'body' => 'PHPは、Hypertext Preprocessorの略です。',
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'title' => 'HTML',
                'body' => 'HTMLは、Hypertext Markup Languageの略です。',
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'title' => 'CSS',
                'body' => "CSSは、\nCascading Style Sheets\nの略です。",
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'title' => '混在',
                'body' => "Test123 てすとアイウエオｱｲｳｴｵ\n漢字！ＡＢＣ ａｂｃ １２３   😊✨",
            ],
        ];
        foreach ($samples as $sample) {
            \App\Models\Memo::updateOrCreate(['id' => $sample['id']], $sample);
        }
    }
}
