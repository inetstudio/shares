<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\SharesPackage\Shares\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/shares-package',
    ],
    function () {
        Route::any('shares-package/shares/data/index', 'DataControllerContract@getIndexData')
            ->name('back.shares-package.shares.data.index');

        Route::resource(
            'shares', 'ResourceControllerContract',
            [
                'except' => [
                    'create',
                    'store',
                ],
                'as' => 'back.shares-package',
            ]
        );
    }
);
