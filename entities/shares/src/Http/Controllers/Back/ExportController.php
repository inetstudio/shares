<?php

namespace InetStudio\SharesPackage\Shares\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\SharesPackage\Shares\Contracts\Http\Controllers\Back\ExportControllerContract;
use InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Export\ItemsExportResponseContract;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;

/**
 * Class ExportController.
 */
class ExportController extends Controller implements ExportControllerContract
{
    /**
     * Экспортируем записи.
     *
     * @param  Request  $request
     * @param  ItemsExportResponseContract  $response
     *
     * @return ItemsExportResponseContract
     */
    public function exportItems(Request $request, ItemsExportResponseContract $response): ItemsExportResponseContract
    {
        return $response;
    }
}
