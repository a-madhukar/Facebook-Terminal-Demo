<?php

namespace App\Console\Commands;

use App\User; 
use Illuminate\Console\Command;
use App\Services\Facebook\FacebookInterface as Facebook; 

class DisplayUserFbPosts extends Command
{

    protected $fb; 

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebook:display-user-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Displays the user's posts";

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
        $posts = $this->fb->displayUserPosts(User::first())->take(10)
        ->map(function($post, $key){
            return [
                'id' => $key + 1, 
                'message' => isset($post->message) ? $post->message : $post->story
            ]; 
        }); 

        // dd($posts); 

        $headers = ["id", "Post"]; 
        $this->table($headers, $posts); 
        // $this->info($this->fb->displayUserPosts()); 
    }
}
