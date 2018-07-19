<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProfileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('birthdate', 'date', [
                'label' => 'Birthday'
            ])
            ->add('phone', 'text', [
                'label' => 'Phone'
            ])
            ->add('Save', 'submit', [
                'class' => 'btn btn-primary'
            ]);
    }
}
