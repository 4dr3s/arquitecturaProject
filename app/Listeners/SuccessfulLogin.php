<?php

namespace App\Listeners;

use App\Models\Accounting;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public $user;

    public function __construct()
    {
        $user = Auth::user();    
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $time = Carbon::now()->toDateTimeString();
        $accounting = Accounting::create([
            'user_id' => $event->user->id,
            'userName' => $event->user->name,
            'inicioSesion' => (new DateTime($time))->format('Y-m-d\TH:i:s')
        ]);

        $account = session()->get('accounting');
        $account = 
        [
            'id' => $accounting->id
        ];
        session()->put('accounting',$account);
        // dd(session()->get('accounting'));
        $accounting->save();
    }
}
