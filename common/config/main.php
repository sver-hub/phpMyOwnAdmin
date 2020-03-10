<?php

use src\Core\Domain\Mapper\Mapper;
use src\Modules\Table\Domain\Repository\SysColumnRepositoryInterface;
use src\Modules\Table\Domain\Repository\SysTableRepositoryInterface;
use src\Modules\Table\Domain\Repository\SysTypeRepositoryInterface;
use src\Modules\Table\Infrastructure\Repository\SysColumnRepository;
use src\Modules\Table\Infrastructure\Repository\SysTableRepository;
use src\Modules\Table\Infrastructure\Repository\SysTypeRepository;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'container' => [
        'singletons' => [
            SysTableRepositoryInterface::class => ['class' => SysTableRepository::class],
            SysColumnRepositoryInterface::class => ['class' => SysColumnRepository::class],
            SysTypeRepositoryInterface::class => ['class' => SysTypeRepository::class],
            Mapper::class => ['class' => Mapper::class],
        ]
    ]
];
