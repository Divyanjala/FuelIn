<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\CommonController;
use domain\Facades\QuotaFacade;
use Illuminate\Console\Command;

class QuotaReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resetQuota:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset all quotas weekly';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        QuotaFacade::allQuotaReset('FUILINSRILANKA');
        print_r(Command::SUCCESS);
        return Command::SUCCESS;
    }
}
