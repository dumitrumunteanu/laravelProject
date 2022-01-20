<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepository;

class RussianRouletteStatsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'russian-roulette:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private CacheRepository $cacheRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CacheRepository $cacheRepository)
    {
        parent::__construct();
        $this->cacheRepository = $cacheRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $table = [];
        $stats = $this->cacheRepository->get('stats', []);

        foreach ($stats as $key => $count) {
            $table[] = [$key, $count];
        }

        $this->table(['state', 'count'], $table);
    }
}
