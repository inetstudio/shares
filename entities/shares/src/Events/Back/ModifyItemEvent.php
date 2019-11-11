<?php

namespace InetStudio\SharesPackage\Shares\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\SharesPackage\Shares\Contracts\Models\ShareModelContract;
use InetStudio\SharesPackage\Shares\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var ShareModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  ShareModelContract  $item
     */
    public function __construct(ShareModelContract $item)
    {
        $this->item = $item;
    }
}
