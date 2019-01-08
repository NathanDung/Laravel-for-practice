<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwsController extends Controller
{
    public function test()
    {
		//Creating a presigned request
		$s3Client = new \Aws\S3\S3Client([
		    'region'  => 'ap-northeast-1',
		    'version' => '2006-03-01',
		    'credentials' => [
                'key'    => 'AKIAJOG5E2VYNTR4BWNA',
                'secret' => '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',
            ],
		]);

		$cmd = $s3Client->getCommand('GetObject', [
		    'Bucket' => 'nathand',
		    'Key'    => '123',
		]);

		$request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
		$presignedUrl = (string) $request->getUri();

		echo $presignedUrl;
    }
}