<?php

namespace Finances\Controller;

use Finances\Form\FinancesForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
// use Finances\Model\FinancesTable;
use Finances\Model\Finances;


class FinancesController extends AbstractActionController
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'finances'      => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new FinancesForm();
        $form->get('submit')->setValue('Adicionar');
        
        $request = $this->getRequest();
        
        if(!$request->isPost())
        {
            return new ViewModel(['form' => $form]);
        }
        
        $finances = new Finances();
        $form->setInputFilter($finances->getInputFilter());
        $form->setData($request->getPost());
        
        if(!$form->isValid())
        {
            return new ViewModel(['form' => $form]);
        }
        
        print_r('teste');
        $finances->exchangeArray($form->getData());
        $this->table->saveFinances($finances);
        return $this->redirect()->toRoute('finances');
    }
}