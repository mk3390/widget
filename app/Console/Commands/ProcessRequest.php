<?php

namespace App\Console\Commands;

use App\Models\DonationRequest;
use Illuminate\Console\Command;

class ProcessRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process request description';

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
        $donationRequest = DonationRequest::where('is_completed',false)->get();
        foreach ($donationRequest as $key => $value) {
            # code...
        }
    }
}
