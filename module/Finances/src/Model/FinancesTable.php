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
        $resultSet = $this->tableGateway->select();
        $resultSet->buffer();

        return $resultSet;
    }

    public function saveFinances(Finances $finance)
    {
        $data = [
            'title'     => $finance->title,
            'type'      => $finance->type,
            'price'     => $finance->price,
            'category'  => $finance->category,
            'date'      => '2020-07-01 00:00:00'
        ];

        $id = (int) $finance->id;
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        $this->tableGateway->update($data, ['id' => $id]);
    }
}