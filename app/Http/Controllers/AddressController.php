<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\AddressForm;
use App\Addresses;

class AddressController extends Controller
{
    use FormBuilderTrait;
    
    public function add(Request $request, FormBuilder $formBuilder) 
    {
        $userProfile = $request->user()->userProfile;
        $addresses = $userProfile->addresses;

        echo $userProfile->id; exit;
        $addressForm = $formBuilder->create(\App\Forms\AddressForm::class, [
            'method' => 'POST',
            'url' => route('address-save'),
            'model' => $addresses
        ]);
        
        return view('address-edit', compact('addressForm'));
    }
    
    public function update(Request $request)
    {
        $form = $this->form(AddressForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $address = \App\Address::updateOrCreate(['id' => $request->input('id')]);

        $inputs = $request->all();
        $address->street = $inputs['street'];
        $address->city = $inputs['birthdate'];
        $address->state = $inputs['state'];
        $address->zip = $inputs['zip'];
        
        echo '<pre>';
        print_r($address);
        echo '</pre>';
        exit;
        $address->save();
        return redirect()->route('profile');
    }
}
