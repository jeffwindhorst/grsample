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
        $userProfile = $request->user()->userProfile;
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $inputs = $request->all();
        
        $address = new \App\Address();
        $address->street = $inputs['street'];
        $address->city = $inputs['city'];
        $address->state = $inputs['state'];
        $address->zip = $inputs['zip'];
        $userProfile->addresses()->save($address);
        
//        $address = \App\Address::updateOrCreate(
//                [
//                    'id' => $request->input('id')
//                ], [
//                    'street'    => $inputs['street'],
//                    'city'      => $inputs['city'],
//                    'state'     => $inputs['state'],
//                    'zip'       => $inputs['zip'],
//                    'addressable_id' => $userProfile->id,
//                    'addressable_type' => 'user_profile'
//                ]);

        return redirect()->route('profile');
    }
}
