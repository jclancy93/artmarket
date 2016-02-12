<?php

use Aws\Laravel\AwsServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | AWS SDK Configuration
    |--------------------------------------------------------------------------
    |
    | The configuration options set in this file will be passed directly to the
    | `Aws\Sdk` object, from which all client objects are created. The minimum
    | required options are declared here, but the full set of possible options
    | are documented at:
    | http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/configuration.html
    |
    */

    'credentials' => [
        'key'    => 'AKIAJ4DXLQC3RI5D4E7A',
        'secret' => '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',
    ],
    'region' => 'us-west-2',
    'version' => 'latest',

    // You can override settings for specific services
    'Ses' => [
        'region' => 'us-east-1',
    ],
];
