<?php

namespace Finances;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    const VERSION = '3.1.3';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\FinancesTable::class => function($container) {
                    $tableGateway = $container->get(Model\FinancesTableGateway::class);
                    return new Model\FinancesTable($tableGateway);
                },
                Model\FinancesTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Finances());
                    return new TableGateway('finances', $dbAdapter, null, $resultSetPrototype);
                }
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\FinancesController::class => function($container) {
                    return new Controller\FinancesController(
                        $container->get(Model\FinancesTable::class)
                    );
                },
            ],
        ];
    }
}