<?php

namespace Finances\Controller;

use Finances\Model\FinancesTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FinancesController extends AbstractActionController
{
    private $table;

    public function __construct(FinancesTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'finances' => $this->table->fetchAll(),
        ]);
    }


}