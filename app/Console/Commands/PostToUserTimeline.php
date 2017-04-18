<?php

namespace App\Console\Commands;

use App\User; 
use Illuminate\Console\Command;
use App\Services\Facebook\FacebookInterface as Facebook; 

class PostToUserTimeline extends Command
{

    protected $fb; 

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebook:post {--m= : The status update}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a post to the user timeline';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Facebook $fb)
    {
        parent::__construct();
        $this->fb = $fb; 
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = $this->fb->postToUserTimeline(
            $this->option('m'),
            User::first()
        ); 
        $this->info("Successfully Posted to the timeline"); 
    }
}
