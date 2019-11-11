<?php

namespace InetStudio\SharesPackage\Shares\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;

/**
 * Interface ItemsServiceContract.
 */
interface ItemsServiceContract extends BaseServiceContract
{
    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return ShareModelContract
     */
    public function save(array $data, int $id): ShareModelContract;
}
