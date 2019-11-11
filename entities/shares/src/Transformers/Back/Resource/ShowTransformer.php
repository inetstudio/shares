<?php

namespace InetStudio\SharesPackage\Shares\Transformers\Back\Resource;

use League\Fractal\TransformerAbstract;
use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;
use InetStudio\SharesPackage\Shares\Contracts\Transformers\Back\Resource\ShowTransformerContract;

/**
 * Class ShowTransformer.
 */
class ShowTransformer extends TransformerAbstract implements ShowTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  ShareModelContract  $item
     *
     * @return array
     */
    public function transform(ShareModelContract $item): array
    {
        return $item->toArray();
    }
}
