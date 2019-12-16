<?php

namespace InetStudio\SharesPackage\Shares\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
     * @var  array
     */
    public $bindings = [
        'InetStudio\SharesPackage\Shares\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\SharesPackage\Shares\Events\Back\ModifyItemEvent',
        'InetStudio\SharesPackage\Shares\Contracts\Exports\ItemsExportContract' => 'InetStudio\SharesPackage\Shares\Exports\ItemsExport',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Controllers\Back\ExportControllerContract' => 'InetStudio\SharesPackage\Shares\Http\Controllers\Back\ExportController',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\SharesPackage\Shares\Http\Controllers\Back\ResourceController',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\SharesPackage\Shares\Http\Controllers\Back\DataController',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\SharesPackage\Shares\Http\Requests\Back\SaveItemRequest',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract' => 'InetStudio\SharesPackage\Shares\Http\Responses\Back\Data\GetIndexDataResponse',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Export\ItemsExportResponseContract' => 'InetStudio\SharesPackage\Shares\Http\Responses\Back\Export\ItemsExportResponse',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\SharesPackage\Shares\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\EditResponseContract' => 'InetStudio\SharesPackage\Shares\Http\Responses\Back\Resource\EditResponse',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\SharesPackage\Shares\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\SharesPackage\Shares\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\SharesPackage\Shares\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\SharesPackage\Shares\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\SharesPackage\Shares\Contracts\Listeners\ShareActionListenerContract' => 'InetStudio\SharesPackage\Shares\Listeners\ShareActionListener',
        'InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract' => 'InetStudio\SharesPackage\Shares\Models\ShareModel',
        'InetStudio\SharesPackage\Shares\Contracts\Services\Back\DataTables\IndexServiceContract' => 'InetStudio\SharesPackage\Shares\Services\Back\DataTables\IndexService',
        'InetStudio\SharesPackage\Shares\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\SharesPackage\Shares\Services\Back\ItemsService',
        'InetStudio\SharesPackage\Shares\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\SharesPackage\Shares\Services\Front\ItemsService',
        'InetStudio\SharesPackage\Shares\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\SharesPackage\Shares\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\SharesPackage\Shares\Contracts\Transformers\Back\Resource\ShowTransformerContract' => 'InetStudio\SharesPackage\Shares\Transformers\Back\Resource\ShowTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
