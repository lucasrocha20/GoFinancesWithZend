<?php

namespace Finances\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class FinancesTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        // return $this->tableGateway->select();

        $resultSet = $this->tableGateway->select();
        $resultSet->buffer();

        return $resultSet;
    }
}