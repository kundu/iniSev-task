<?php

namespace App\Console\Commands;

use App\Services\CacheService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CacheGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To generate the cache from db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cacheService = new CacheService();
        $cacheService->generateHowToBuyCache();
        $cacheService->generateHomepageSlider();
        $cacheService->generateSixFeature();
        $cacheService->generateThreeFeature();
        $cacheService->generateService();
        $cacheService->generateSettings();
        $cacheService->generatePages();

        Log::info("Cache data is updated");
    }
}
