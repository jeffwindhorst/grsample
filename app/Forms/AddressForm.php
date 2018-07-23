<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AddressForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('id', 'hidden')
            ->add('street', 'text', [
                'label' => 'Street',
            ])
            ->add('city', 'text', [
                'label' => 'City',
            ])
            ->add('state', 'text', [
                'label' => 'State',
            ])
            ->add('zip', 'text', [
                'label' => 'Zip',
            ])
            ->add('Save Address', 'submit', [
                'class' => 'btn btn-primary'
            ]);
    }
}
