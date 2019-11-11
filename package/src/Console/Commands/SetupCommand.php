<?php

namespace InetStudio\SharesPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:shares-package:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup shares package';

    /**
     * Инициализация команд.
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Shares setup',
                'command' => 'inetstudio:shares-package:shares:setup',
            ],
            [
                'type' => 'artisan',
                'description' => 'Shares users setup',
                'command' => 'inetstudio:shares-package:users:setup',
            ],
        ];
    }
}
