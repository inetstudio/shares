<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\SharesPackage\Shares\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/shares-package',
    ],
    function () {
        Route::any('shares/data/index', 'DataControllerContract@getIndexData')
            ->name('back.shares-package.shares.data.index');

        Route::get('shares/export', 'ExportControllerContract@exportItems')
            ->name('back.shares-package.shares.export');

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
