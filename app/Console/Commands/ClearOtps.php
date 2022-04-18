<?php

namespace App\Console\Commands;

use App\Models\Otp;
use Illuminate\Console\Command;

class ClearOtps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:otps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clears unactive otps';

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
        $otps = Otp::notActives(5)->get();

        if ($otps->isEmpty()) {
            $this->error('Opts table is clear!');
        }

        collect($otps)->each(function ($otp) {
            $this->info("code {$otp->code} removed.");
            $otp->delete();
        });

        return 0;
    }
}
