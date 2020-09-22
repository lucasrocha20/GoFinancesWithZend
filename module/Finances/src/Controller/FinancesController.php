<?php

namespace Finances\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FinancesController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}