<?php

namespace App\Observers;

use App\Models\RechargeOrder;
use Illuminate\Support\Str;

class RechargeOrderObserver
{
    /**
     * Handle the RechargeOrder "creating" event.
     *
     * @param  \App\Models\RechargeOrder  $rechargeOrder
     * @return void
     */
    public function creating(RechargeOrder $rechargeOrder)
    {
        $rechargeOrder->reference = Str::uuid();
    }
}
