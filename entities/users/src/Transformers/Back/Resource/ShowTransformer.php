<?php

namespace InetStudio\SharesPackage\Users\Transformers\Back\Resource;

use League\Fractal\TransformerAbstract;
use InetStudio\SharesPackage\Users\Contracts\Models\UserModelContract;
use InetStudio\SharesPackage\Users\Contracts\Transformers\Back\Resource\ShowTransformerContract;

/**
 * Class ShowTransformer.
 */
class ShowTransformer extends TransformerAbstract implements ShowTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  UserModelContract  $item
     *
     * @return array
     */
    public function transform(UserModelContract $item): array
    {
        return $item->toArray();
    }
}
