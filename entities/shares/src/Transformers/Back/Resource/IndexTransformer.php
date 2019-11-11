<?php

namespace InetStudio\SharesPackage\Shares\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;
use InetStudio\SharesPackage\Shares\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  ShareModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(ShareModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'user' => view(
                    'admin.module.shares-package.shares::back.partials.datatables.user',
                    compact('item')
                )
                ->render(),
            'href' => $item['href'],
            'is_checked' => view(
                'admin.module.shares-package.shares::back.partials.datatables.checked',
                [
                    'checked' => $item['is_checked'],
                ]
            )->render(),
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                    'admin.module.shares-package.shares::back.partials.datatables.actions',
                    compact('item')
                )
                ->render(),
        ];
    }
}
