<?php

namespace InetStudio\SharesPackage\Shares\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;
use InetStudio\SharesPackage\Shares\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  ShareModelContract  $model
     */
    public function __construct(ShareModelContract $model)
    {
        parent::__construct($model);
    }

    /**
     * Записываем действие пользователя.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     *
     * @return ShareModelContract|null
     *
     * @throws BindingResolutionException
     */
    public function shareAction(int $userId, string $actionAlias): ?ShareModelContract
    {
        $usersRepository = app()->make('InetStudio\ACL\Users\Contracts\Repositories\UsersRepositoryContract');
        $actionsService = app()->make('InetStudio\SharesPackage\Actions\Contracts\Services\Front\ItemsServiceContract');

        $user = $usersRepository->getItemById($userId);
        $action = $actionsService->getModel()->where('alias', '=', $actionAlias)->first();

        if (! $user['id'] || ! $action) {
            return null;
        }

        if ($action['single']) {
            $sharesCount = $this->getModel()
                ->where(
                    [
                        ['user_id', '=', $user['id']],
                        ['action_id', '=', $action['id']],
                    ]
                )
                ->count();

            if ($sharesCount > 0) {
                return null;
            }
        }

        $data = [
            'user_id' => $user['id'],
            'action_id' => $action['id'],
            'points' => $action['points'],
        ];

        $share = $this->saveModel($data, 0);

        return $share;
    }
}
