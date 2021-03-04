<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'images'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'imagesAdmin' => [
            'driver' => 'local',
            'root' => public_path('images/user/admin'),
            // 'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'imagesDoctor' => [
            'driver' => 'local',
            'root' => public_path('images/user/doctor'),
            // 'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'imagesPaciente' => [
            'driver' => 'local',
            'root' => public_path('images/user/paciente'),
            // 'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'imagesSecretaria' => [
            'driver' => 'local',
            'root' => public_path('images/user/secretaria'),
            // 'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'imagesLaboratorio' => [
            'driver' => 'local',
            'root' => public_path('images/user/laboratorio'),
            // 'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'imagesSymptom' => [
            'driver' => 'local',
            'root' => public_path('images/user/paciente/symptoms'),
            // 'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'documentsPaciente' => [
            'driver' => 'local',
            'root' => public_path('images/user/paciente/documents'),
            // 'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'recordQueries' => [
            'driver' => 'local',
            'root' => public_path('records/queries'),
            'visibility' => 'public'
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],

        'images' => [
            'driver' => 'local',
            'root' => public_path('images'),
            // 'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

    ],

];
