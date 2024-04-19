<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleMapController extends Controller
{

    public function crawlWithUrl(Request $request)
    {
        // $url = $request->input('url');
        $response = \GoogleMaps::load('geocoding')
            ->setParam (['address' =>'santa cruz'])
            ->get();

        return response()->json($response);
        
    }

}
