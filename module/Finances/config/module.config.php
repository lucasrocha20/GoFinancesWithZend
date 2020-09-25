<?php

namespace Finances;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            // Controller\FinancesController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\FinancesController::class,
                        'action' => 'index',
                    ],
                ],
            ],
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
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_path_stack' => [
            'finances' => __DIR__ . '/../view',
        ],
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/finances/finances/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
    ],
    'db' => [
    	'driver' => 'Pdo_Mysql',
    	'database' => 'goFinances',
    	'username' => 'root',
    	'password' => 'root',
    	'hostname' => '127.0.0.1'
    ],
];