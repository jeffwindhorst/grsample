<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProfileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('birthdate', 'date', [
                'label' => 'Birthday',
                'rules' => 'required',
                'error_messages' => [
                    'birthdate.required' => 'Birthday is required.'
                ]
            ])
            ->add('phone', 'text', [
                'label' => 'Phone',
                'rules' => 'required|min:10',
                'error_messages' => [
                    'phone.required' => 'Phone is required.'
                ]
            ])
            ->add('Save', 'submit', [
                'class' => 'btn btn-primary'
            ]);
    }
}
