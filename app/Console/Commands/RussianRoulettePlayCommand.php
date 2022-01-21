<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepository;

class RussianRoulettePlayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'russian-roulette:play';

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
        $dead = rand(1, 6);
        $number = 0;
        while (!(1 <= $number && $number <= 6)) {
            $number = (int)$this->ask('Choose a number between 1 and 6');
        }

        $res = ($number === $dead ? 'dead' : 'alive');

        if($res === 'alive') {
            $this->info('You survived.');
        }
        else {
            $this->info('You lost!');
        }

        $stats = $this->cacheRepository->get('stats', []);
        $stats[$res] = $stats[$res] ?? 0;
        $stats[$res]++;

        $this->cacheRepository->set('stats', $stats, 86400); // keep for 1 day in cache

        $stats = $this->cacheRepository->get('guessCount', []);
        $stats[$number] = $stats[$number] ?? 0;
        $stats[$number]++;

        $this->cacheRepository->set('guessCount', $stats, 86400);
    }
}
