<?php

namespace InetStudio\SharesPackage\Users\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\SharesPackage\Users\Contracts\Models\UserModelContract;
use InetStudio\SharesPackage\Users\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  UserModelContract  $model
     */
    public function __construct(UserModelContract $model)
    {
        parent::__construct($model);
    }
}
