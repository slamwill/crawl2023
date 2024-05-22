<?php

namespace App\Services;

use Aws\Kms\KmsClient;
use Aws\Exception\AwsException;

class KmsService
{
    protected $kmsClient;
    protected $symmetryKey;
    protected $asymmetryKey;

    public function __construct()
    {
        $this->kmsClient = new KmsClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $this->symmetryKey = env('KMS_KEY_ID_SYM');
        $this->asymmetryKey = env('KMS_KEY_ID_ASYM');
    }

    public function encryptSymmetry($plaintext)
    {
        $plaintext = base64_encode($plaintext);
        $result = $this->kmsClient->encrypt([
            'KeyId' => $this->symmetryKey,
            'Plaintext' => $plaintext,
        ]);

        return base64_encode($result->get('CiphertextBlob'));
    }

    public function decryptSymmetry($ciphertext)
    {
        $result = $this->kmsClient->decrypt([
            'CiphertextBlob' => base64_decode($ciphertext),
        ]);

        return base64_decode($result->get('Plaintext'));
    }

    public function encryptAymmetry($plaintext)
    {
        $plaintext = base64_encode($plaintext);
        $result = $this->kmsClient->encrypt([
            'KeyId' => $this->asymmetryKey,
            'Plaintext' => $plaintext,
            'EncryptionAlgorithm' => 'RSAES_OAEP_SHA_256'
        ]);

        return base64_encode($result->get('CiphertextBlob'));
    }

    public function decryptAymmetry($ciphertext)
    {
        $result = $this->kmsClient->decrypt([
            'KeyId' => $this->asymmetryKey,
            'CiphertextBlob' => base64_decode($ciphertext),
            'EncryptionAlgorithm' => 'RSAES_OAEP_SHA_256'
        ]);

        return base64_decode($result->get('Plaintext'));
    }
}
