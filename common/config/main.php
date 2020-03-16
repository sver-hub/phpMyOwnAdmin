<?php

use src\Core\Domain\Mapper\Mapper;
use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use src\Modules\Record\Infrastructure\Repository\RecordRepository;
use src\Modules\SysTable\Domain\Repository\SysColumnRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTypeRepositoryInterface;
use src\Modules\SysTable\Infrastructure\Repository\SysColumnRepository;
use src\Modules\SysTable\Infrastructure\Repository\SysTableRepository;
use src\Modules\SysTable\Infrastructure\Repository\SysTypeRepository;

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
            RecordRepositoryInterface::class => ['class' => RecordRepository::class]
        ]
    ]
];
