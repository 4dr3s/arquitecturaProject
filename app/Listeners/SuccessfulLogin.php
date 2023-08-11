<?php

namespace App\Listeners;

use App\Models\Accounting;
use Carbon\Carbon;
use DateTime;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class SuccessfulLogin
{
    public $user;

    public function __construct()
    {
        $user = Auth::user();    
    }

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
        $accounting->save();
    }
}
