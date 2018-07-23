<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\AddressForm;
use App\Addresses;
use GuzzleHttp\Client;

class AddressController extends Controller
{
    use FormBuilderTrait;
    
    public function index(Request $request)
    {
        // Show all addresses.
        $userProfile = $request->user()->userProfile;
        $addresses = $userProfile->addresses;
        
        return view('address-list')->with('addresses', $addresses);
    }
    
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

        return redirect()->route('profile');
    }
    
    public function geocode(Request $request)
    {
        //
        // EXAMPLE URI
        // 
        // https://nominatim.openstreetmap.org/search?q=135+pilkington+avenue,+birmingham&format=xml&polygon=1&addressdetails=1
        //
        $baseUrl = 'https://nominatim.openstreetmap.org/search?q=';
        $userProfile = $request->user()->userProfile;
        $addresses = $userProfile->addresses;
        foreach($addresses as $address) {
            $street = str_replace(' ', '+', $address->street);
            $city = str_replace(' ', '+', $address->city);
            $state = str_replace(' ', '+', $address->state);
            $zip = str_replace(' ', '', $address->zip);
            $request = $baseUrl . $street .','. $city .','. $state . ',' . $zip . '&format=json&addressdetails=1';
        
            $client = new Client([
                'base_uri' => $request,
                'timeout'  => 2.0,
            ]);
            
            $response = $client->request('GET', $request, ['verify' => false]);
            $jdata = json_decode((string) $response->getBody());
            
            $address->latitude = $jdata[0]->lat;
            $address->longitude = $jdata[0]->lon;
            $address->save();
            
            return redirect()->route('addresses');
        }
        
        
    }
}
