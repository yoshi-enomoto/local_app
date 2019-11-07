<?php

use Illuminate\Database\Seeder;

class CrudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cruds')->truncate();

        DB::table('cruds')->insert([
            [
                'function' => 'index',
                'ja_name' => '一覧',
                'is_not_get' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'function' => 'create',
                'ja_name' => '登録',
                'is_not_get' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'function' => 'store',
                'ja_name' => '保存',
                'is_not_get' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'function' => 'show',
                'ja_name' => '詳細',
                'is_not_get' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'function' => 'edit',
                'ja_name' => '編集',
                'is_not_get' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'function' => 'update',
                'ja_name' => '更新',
                'is_not_get' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'function' => 'delete',
                'ja_name' => '削除',
                'is_not_get' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
