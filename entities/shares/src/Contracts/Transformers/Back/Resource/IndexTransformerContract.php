<?php

namespace InetStudio\SharesPackage\Shares\Contracts\Transformers\Back\Resource;

use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  ShareModelContract  $item
     *
     * @return array
     */
    public function transform(ShareModelContract $item): array;
}
