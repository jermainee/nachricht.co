<?php

namespace App\Console\Commands;

use App\Message;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MessageDeleteJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete messages with exceeded deadline';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Message::whereRaw('DATE_ADD(created_at, INTERVAL delete_after_hours HOUR) < NOW()')
            ->update([
        	'uid' => null,
	        'message' => '',
	        'password' => '',
	        'iv' => '',
        ]);
    }
}
