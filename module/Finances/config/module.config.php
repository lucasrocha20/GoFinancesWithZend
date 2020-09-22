<?php

namespace Finances;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\FinancesController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'finances' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/finances[/:action[/:id]]',
                    'constraint' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\FinancesController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'finances' => __DIR__ . '/../view',
        ],
    ],
];