<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function store(Request $request)
    {
        $key = $request->key;
        $value = $request->value;
        $expireTime = 600; // 10 minutes in seconds

        Redis::set($key, $value);
        Redis::expire($key, $expireTime);

        return response()->json(['message' => 'Data stored in Redis', 'key' => $key, 'value' => $value, 'expires_in' => $expireTime . ' seconds']);
    }

    public function retrieve(Request $request)
    {
        $key = $request->key;
        $value = Redis::get($key);
        $ttl = Redis::ttl($key);

        return response()->json(['message' => 'Data retrieved from Redis', 'key' => $key, 'value' => $value, 'time_to_live' => $ttl . ' seconds']);
    }
}
