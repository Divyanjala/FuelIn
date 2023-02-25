<?php

namespace App\Http\Controllers;

use domain\Facades\QuotaFacade;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function CronJobs($hidden_id)
    {
        if ($hidden_id=='FUILINSRILANKA') {
            return  QuotaFacade::allQuotaReset($hidden_id);
        }

    }
}
