<?php

namespace InetStudio\SharesPackage\Users\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\SharesPackage\Users\Contracts\Models\UserModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class UserModel.
 */
class UserModel extends Model implements UserModelContract
{
    use Auditable;
    use SoftDeletes;
    use BuildQueryScopeTrait;

    /**
     * Тип сущности.
     */
    const ENTITY_TYPE = 'shares_user';

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
    protected $table = 'shares_users';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'network',
        'network_id',
        'additional_info',
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
     * Атрибуты, которые должны быть преобразованы к базовым типам.
     *
     * @var array
     */
    protected $casts = [
        'additional_info' => 'array',
    ];

    /**
     * Загрузка модели.
     */
    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'network',
            'network_id',
            'additional_info',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'share' => function ($query) {
                $query->select(['id', 'href', 'share_user_id', 'user_id', 'is_checked']);
            },
        ];
    }

    /**
     * Сеттер атрибута network.
     *
     * @param $value
     */
    public function setNetworkAttribute($value): void
    {
        $this->attributes['network'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута network_id.
     *
     * @param $value
     */
    public function setNetworkIdAttribute($value): void
    {
        $this->attributes['network_id'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута additional_info.
     *
     * @param $value
     */
    public function setAdditionalInfoAttribute($value): void
    {
        $this->attributes['additional_info'] = json_encode((array) $value);
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

    /**
     * Отношение "один к одному" с моделью шера.
     *
     * @return HasOne
     *
     * @throws BindingResolutionException
     */
    public function share(): HasOne
    {
        $shareModel = app()->make('InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract');

        return $this->hasOne(
            get_class($shareModel),
            'share_user_id'
        );
    }
}
