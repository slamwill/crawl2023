<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CrawlWithUrlService;

class CrawlWithUrlController extends Controller
{

    public function crawlWithUrl(Request $request, CrawlWithUrlService $crawlWithUrlService)
    {
        $url = $request->input('url');
        $result = $crawlWithUrlService->crawlPage($url);

        return response()->json($result);
    }

}
