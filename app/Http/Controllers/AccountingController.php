<?php

namespace App\Http\Controllers;

use App\Connection\MongoDBConnectionFactory as ConnectionMongoDBConnectionFactory;
use App\Models\Accounting;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index(Request $request)
    {
        $mongoDBFactory = new ConnectionMongoDBConnectionFactory();
        $mongoDBConnection = $mongoDBFactory->createConnection()->getConnectionName();
        $accounting = Accounting::on($mongoDBConnection)->where('_id',$request->id)->get();
                
        return response()->json([
            'data' => $accounting
        ],200);
    }
}
