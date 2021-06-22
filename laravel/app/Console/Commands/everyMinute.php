<?php

namespace App\Console\Commands;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:submit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will submit assignment';

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
       $assgs = Assignment::all();
       foreach($assgs as $assg){
           if($assg->isSubmitted == 0){

           }
       }
    }
}
