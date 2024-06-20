<?php

namespace App\Console\Commands;

use App\Models\Product;
use Faker\Core\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filesystem;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh migrations, seeds and pictures';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (app()->isProduction()) {
            return self::FAILURE;
        }

        dump('deleting');

        $files = Storage::allFiles('/public/images/products');
        Storage::delete($files);
        $this->call('migrate:fresh', [
            '--seed' => true
        ]);
        return self::SUCCESS;
    }
}
