<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Python system install path
    |--------------------------------------------------------------------------
    |
    | Set this value to the path of your system install python
    | this is by default "null"
    | Set this path like
    | Example: 'C:\Python27\python.exe' or '/usr/bin/python' etc...
    |
    */
    'python_path' => env('PYTHON_PATH', null),

    /*
    |--------------------------------------------------------------------------
    | Python Resource Path
    |--------------------------------------------------------------------------
    |
    | Set this value to the path of your system install python
    | this is by default "{project}/resources/python"
    | Set this path like
    | Example: '{project}/public/python' or '{project}/storage/python' etc...
    |
    */
    'python_resource_path' => env('PYTHON_RESOURCE_PATH', resource_path('python')),

    /*
    |--------------------------------------------------------------------------
    | Python Version
    |--------------------------------------------------------------------------
    |
    | Set this value to the latest version of python which installed in your system
    | this is by default "python3"
    | Set this version like give int
    | Example: '' or '2' etc...
    |
    */
    'python_version' => env('PYTHON_VERSION', 3),

];
