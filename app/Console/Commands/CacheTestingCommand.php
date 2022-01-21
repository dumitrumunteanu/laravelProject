<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Contracts\Config\Repository as ConfigRepository;

class CacheTestingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-cache:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private CacheRepository $cacheRepository;
    private ConfigRepository $configRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CacheRepository $cacheRepository, ConfigRepository $configRepository)
    {
        parent::__construct();
        $this->cacheRepository = $cacheRepository;
        $this->configRepository = $configRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lastVisit = $this->cacheRepository->get('lastCommandVisit', 'never');

        $this->info("Command called last time: {$lastVisit}");

        $this->cacheRepository->set('lastCommandVisit', date(\DateTime::ATOM), 60);

        $res = $this->ask(
            "Do you know that the app is running in {$this->configRepository->get('app.env')} mode"
        );

        $stats = $this->cacheRepository->get('knowAnswer', []);
        $stats[$res] = $stats[$res] ?? 0;
        $stats[$res]++;

        $table = [];

        foreach ($stats as $key => $count) {
            $table[] = [$key, $count];
        }

        $this->table(['answer', 'count'], $table);

        $this->cacheRepository->set('knowAnswer', $stats);
    }
}
