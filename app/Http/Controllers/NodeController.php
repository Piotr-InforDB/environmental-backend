<?php

namespace App\Http\Controllers;

use App\Models\NodeMetadata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Throwable;

class NodeController extends Controller{

    public function submit(Request $request){
        $data = $request->json()->get('data');

        try{
            NodeMetadata::insert([
                'hub_mac_address' => $request->json()->get('hub'),
                'node_mac_address' => $request->json()->get('node'),
                'sensor' => $data['key'],
                'value' => $data['value'],
                'timestamp' => Carbon::now(),
            ]);
        }
        catch (Throwable $exception){
            dd($exception->getMessage());
        }

        return response(null, 200);
    }

}
