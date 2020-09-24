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

    public function getFinance($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row)
        {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
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

    public function deleteFinance($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}