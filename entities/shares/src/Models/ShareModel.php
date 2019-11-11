<?php

namespace InetStudio\SharesPackage\Shares\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\ACL\Users\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class ShareModel.
 */
class ShareModel extends Model implements ShareModelContract
{
    use Auditable;
    use SoftDeletes;
    use BuildQueryScopeTrait;

    /**
     * Тип сущности.
     */
    const ENTITY_TYPE = 'share';

    /**
     * Should the timestamps be audited?
     *
     * @var bool
     */
    protected $auditTimestamps = true;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'shares';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'href',
        'share_user_id',
        'user_id',
        'is_checked',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Загрузка модели.
     */
    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'href',
            'share_user_id',
            'user_id',
            'is_checked',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'user' => function ($query) {
                $query->select(['id', 'name', 'email']);
            },

            'share_user' => function ($query) {
                $query->select(['id', 'network', 'network_id', 'additional_info']);
            },
        ];
    }

    /**
     * Сеттер атрибута href.
     *
     * @param $value
     */
    public function setHrefAttribute($value): void
    {
        $this->attributes['href'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута share_user_id.
     *
     * @param $value
     */
    public function setShareUserIdAttribute($value): void
    {
        $this->attributes['share_user_id'] = (int) trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута user_id.
     *
     * @param $value
     */
    public function setUserIdAttribute($value): void
    {
        $this->attributes['user_id'] = (int) trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута is_checked.
     *
     * @param $value
     */
    public function setIsCheckedAttribute($value): void
    {
        $value = $value[0] ?? (is_array($value) ? '' : $value);

        $this->attributes['is_checked'] = (bool) trim(strip_tags($value));
    }

    /**
     * Геттер атрибута type.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return self::ENTITY_TYPE;
    }

    use HasUser;

    /**
     * Отношение "один к одному" с моделью пользователя шера.
     *
     * @return HasOne
     *
     * @throws BindingResolutionException
     */
    public function share_user(): HasOne
    {
        $shareUserModel = app()->make('InetStudio\SharesPackage\Users\Contracts\Models\UserModelContract');

        return $this->hasOne(
            get_class($shareUserModel),
            'id',
            'share_user_id',
        );
    }
}
