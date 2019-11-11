<?php

namespace InetStudio\SharesPackage\Shares\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\SharesPackage\Shares\Contracts\Services\Back\DataTables\IndexServiceContract as DataTableServiceContract;

/**
 * Class IndexResponse.
 */
class IndexResponse implements IndexResponseContract
{
    /**
     * @var array
     */
    protected $datatableService;

    /**
     * IndexResponse constructor.
     *
     * @param  DataTableServiceContract  $datatableService
     */
    public function __construct(DataTableServiceContract $datatableService)
    {
        $this->datatableService = $datatableService;
    }

    /**
     * Возвращаем ответ при открытии списка объектов.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $table = $this->datatableService->html();

        return view('admin.module.shares-package.shares::back.pages.index', compact('table'));
    }
}
