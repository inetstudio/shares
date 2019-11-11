<?php

namespace InetStudio\SharesPackage\Users\Providers;

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
        'InetStudio\SharesPackage\Users\Contracts\Models\UserModelContract' => 'InetStudio\SharesPackage\Users\Models\UserModel',
        'InetStudio\SharesPackage\Users\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\SharesPackage\Users\Services\Back\ItemsService',
        'InetStudio\SharesPackage\Users\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\SharesPackage\Users\Services\Front\ItemsService',
        'InetStudio\SharesPackage\Users\Contracts\Transformers\Back\Resource\ShowTransformerContract' => 'InetStudio\SharesPackage\Users\Transformers\Back\Resource\ShowTransformer',
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
