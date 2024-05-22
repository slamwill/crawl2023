<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\KmsService;

class KmsTestController extends Controller
{

    protected $plaintext;

    public function __construct()
    {
        $this->plaintext = 'Hello World';
    }

    
    public function testKmsSymmetryKey(Request $request)
    {
        $kmsService = new KmsService();
        $encrypted = $kmsService->encryptSymmetry($this->plaintext);

        echo "加密以前明文：" . $this->plaintext . "<br>";
        echo "加密以後變成：" . $encrypted . "<br>";
        $decrypted = $kmsService->decryptSymmetry($encrypted);
        echo "解密以後變成：" . $decrypted . "<br>";
    }

    public function testKmsAymmetryKey(Request $request)
    {
        $kmsService = new KmsService();
        $encrypted = $kmsService->encryptAymmetry($this->plaintext);

        echo "加密以前明文：" . $this->plaintext . "<br>";
        echo "加密以後變成：" . $encrypted . "<br>";
        $decrypted = $kmsService->decryptAymmetry($encrypted);
        echo "解密以後變成：" . $decrypted . "<br>";
    }
}
