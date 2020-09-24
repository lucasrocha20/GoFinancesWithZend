<?php

namespace Finances\Form;

use Zend\Form\Form;

class FinancesForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('finances');
        
        $this->add([
            'name'  => 'id',
            'type'  => 'hidden',
        ]);

        $this->add([
            'name'  => 'title',
            'type'  => 'text',
            'options'   =>  [
                'label' =>  'Título',
            ],
        ]);

        $this->add([
            'name'  => 'type',
            'type'  => 'select',
            'options'   =>  [
                'label' =>  'Tipo de transição',
                'value_options' =>  [
                    'income'    =>  'Entrada',
                    'outcome'   =>  'Saída'
                ],
            ],
        ]);

        $this->add([
            'name'  => 'price',
            'type'  => 'number',
            'options'   =>  [
                'label' =>  'Preço',
            ],
        ]);

        $this->add([
            'name'  => 'category',
            'type'  => 'text',
            'options'   =>  [
                'label' =>  'Categoria',
            ],
        ]);

        $this->add([
            'name'  => 'submit',
            'type'  => 'submit',
            'attributes'   =>  [
                'value' =>  'Salvar',
                'id'    =>  'submitbutton',
            ],
        ]);
    }
}