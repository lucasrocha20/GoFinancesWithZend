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
        
        $finances->exchangeArray($form->getData());
        $this->table->saveFinances($finances);
        return $this->redirect()->toRoute('finances');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if($id === 0)
        {
            return $this->redirect()->toRoute('finances',['action' => 'add']);
        }

        try
        {
            $finance = $this->table->getFinance($id);
        } catch (Exception $err)
        {
            return $this->redirect()->toRoute('finances', ['action' => 'index']);
        }

        $form = new FinancesForm();
        $form->bind($finance);

        $form->get('submit')->setAttribute('value', 'Editar');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if(!$request->isPost())
        {
            return $viewData;
        }

        $form->setInputFilter($finance->getInputFilter());
        $form->setData($request->getPost());

        if(!$form->isValid())
        {
            return $viewData;
        }

        $this->table->saveFinances($finance);

        return $this->redirect()->toRoute('finances',['action' => 'index']);
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if(!$id)
        {
            return $this->redirect()->toRoute('finances');
        }

        $request = $this->getRequest();

        if($request->isPost())
        {
            $del = $request->getPost('del', 'Nao');
            
            if($del == 'Sim')
            {
                $this->table->deleteFinance($id);    
            }

            return $this->redirect()->toRoute('finances');
        }

        
        return [
            'id'        =>  $id,
            'finances'  =>  $this->table->getFinance($id),
        ];
    }
}