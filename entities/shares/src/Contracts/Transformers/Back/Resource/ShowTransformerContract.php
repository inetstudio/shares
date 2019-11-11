<?php

namespace InetStudio\SharesPackage\Shares\Contracts\Transformers\Back\Resource;

use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;

/**
 * Interface ShowTransformerContract.
 */
interface ShowTransformerContract
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
