<?php

namespace App\Listeners;

use App\Models\Accounting;
use Carbon\Carbon;
use DateTime;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SuccessfullLout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $time = Carbon::now()->toDateTimeString();
        $account = session()->get('accounting');
        Accounting::where('_id',$account['id'])->update([
            'finSesion' => (new DateTime($time))->format('Y-m-d\TH:i:s')
        ]);
    }
}
