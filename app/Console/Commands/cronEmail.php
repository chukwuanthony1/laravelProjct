<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emailcron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is an email cron job';

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

        $title = 'Cron Job Email';
        $content = 'This is a cron job content';

        Mail::send('sendmail', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('mranthony.chukwu1@gmail.com', 'Christian Nwamba');

            $message->to('steelatrakts@gmail.com');

        });


        // return response()->json(['message' => 'Request completed']);
        Log::info('Email sent successfully'. Carbon::now());
    }
}
