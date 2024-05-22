<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class S3TestController extends Controller
{

    public function getS3(Request $request)
    {
        $content = Storage::disk('s3')->get('123.txt');
        dd($content);

        return response()->json($response);
    }
    public function putS3(Request $request)
    {
        $localFilePath = storage_path('app/public/aaa.txt');
        $s3ObjectKey = 'aaa.txt';
        if (file_exists($localFilePath)) {
            $fileContent = file_get_contents($localFilePath);
            dd($s3ObjectKey);
            dd($fileContent);
            // Storage::disk('s3')->put($s3ObjectKey, $fileContent);
            echo "文件上传成功！";
        } else {
            echo "文件不存在！";
        }
    }

}
