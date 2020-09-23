<?php

namespace Finances\Form;

use Zend\Form\Form;

class FinancesForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('finances', []);
        
        $this->add(new \Zend\Form\Element\Hidden('id'));
        $this->add(new \Zend\Form\Element\Text("title",['label' => "Título"]));
        $this->add(new \Zend\Form\Element\Text("type",['label' => "Tipo de movimento"]));
        $this->add(new \Zend\Form\Element\Number("price",['label' => "Valor"]));
        $this->add(new \Zend\Form\Element\Text("category",['label' => "Categoria"]));
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setAttributes(['value'=>'Salvar','id'=>'submitbutton']);
        $this->add($submit);
    }
}