<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreText implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // 追加
    protected $param;

    /**
     * Create a new job instance.
     *
     * @param [type] $value [description]
     * @return void
     */
    public function __construct($value)
    {
        $this->param = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // テキストファイル作成
        $file = sprintf('%s/%s.txt', storage_path('texts'), date('Q-Ymd-His'));
        touch($file);
        // 書き込み
        $current = file_get_contents($file);
        $current .= $this->param;
        file_put_contents($file, $current);
    }
}
