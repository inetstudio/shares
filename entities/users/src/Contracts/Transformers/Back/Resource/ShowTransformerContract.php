<?php

namespace InetStudio\SharesPackage\Users\Contracts\Transformers\Back\Resource;

use InetStudio\SharesPackage\Users\Contracts\Models\UserModelContract;

/**
 * Interface ShowTransformerContract.
 */
interface ShowTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  UserModelContract  $item
     *
     * @return array
     */
    public function transform(UserModelContract $item): array;
}
