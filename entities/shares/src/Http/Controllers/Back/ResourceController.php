<?php

namespace InetStudio\SharesPackage\Shares\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\SharesPackage\Shares\Contracts\Http\Requests\Back\SaveItemRequestContract;
use InetStudio\SharesPackage\Shares\Contracts\Http\Controllers\Back\ResourceControllerContract;
use InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\EditResponseContract;
use InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\SaveResponseContract;
use InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\ShowResponseContract;
use InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

/**
 * Class ResourceController.
 */
class ResourceController extends Controller implements ResourceControllerContract
{
    /**
     * Список объектов.
     *
     * @param  Request  $request
     * @param  IndexResponseContract  $response
     *
     * @return IndexResponseContract
     */
    public function index(Request $request, IndexResponseContract $response): IndexResponseContract
    {
        return $response;
    }

    /**
     * Получение объекта.
     *
     * @param  Request  $request
     * @param  ShowResponseContract  $response
     *
     * @return ShowResponseContract
     */
    public function show(Request $request, ShowResponseContract $response): ShowResponseContract
    {
        return $response;
    }

    /**
     * Редактирование объекта.
     *
     * @param  Request  $request
     * @param  EditResponseContract  $response
     *
     * @return EditResponseContract
     */
    public function edit(Request $request, EditResponseContract $response): EditResponseContract
    {
        return $response;
    }

    /**
     * Обновление объекта.
     *
     * @param  SaveItemRequestContract  $request
     * @param  SaveResponseContract  $response
     *
     * @return SaveResponseContract
     */
    public function update(SaveItemRequestContract $request, SaveResponseContract $response): SaveResponseContract
    {
        return $response;
    }

    /**
     * Удаление объекта.
     *
     * @param  Request  $request
     * @param  DestroyResponseContract  $response
     *
     * @return DestroyResponseContract
     */
    public function destroy(Request $request, DestroyResponseContract $response): DestroyResponseContract
    {
        return $response;
    }
}
