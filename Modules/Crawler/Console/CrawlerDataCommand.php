<?php

namespace Modules\Crawler\Console;

use Illuminate\Console\Command;
use Modules\Crawler\Http\Controllers\CrawlerController;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CrawlerDataCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'crawler:data {--start=} {--stop=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Crawler Data';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info("process");
    
        $start  = $this->option('start');
        $stop   = $this->option('stop');

        // $this->warn("START =>". $start);
        $crawler = new CrawlerController();
//        $crawler->index($start,$stop);
        $crawler->init();
        // $this->info("Stop => ". $stop);
    }
}
