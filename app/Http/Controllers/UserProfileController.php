<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\ProfileForm;
use App\UserProfile;

class UserProfileController extends Controller
{
    use FormBuilderTrait;
    
    protected $profile;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {    
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profile = \App\UserProfile::find($request->user()->id);
        return view('profile')->with('profile', $profile);
    }

    public function update(FormBuilder $formBuilder) {

        $form = $formBuilder->create(\App\Forms\ProfileForm::class, [
            'method' => 'POST',
            'url' => route('profile-save')
        ]);

        return view('profile-edit', compact('form'));
    }

    public function save(Request $request) {
        $currentUser = $request->user();
        $form = $this->form(ProfileForm::class);

        if (!$form->isValid()) {
           return redirect()->back()->withErrors($form->getErrors())->withInput();
       }

       $userProfile = \App\UserProfile::updateOrCreate(['id' => $currentUser->id]);
       
//       echo '<Pre>';
//       print_r($userProfile);
//       echo '</pre>';
//       exit;
       
       $userProfile->user_id = $currentUser->id;
       $userProfile->birthdate = $request->input('birthdate');
       $userProfile->phone = $request->input('phone');
       /*
       $userProfile->address()->street = $request->input('street');
       $userProfile->address()->city = $request->input('city');
       $userProfile->address()->state = $request->input('state');
       $userProfile->address()->zip = $request->input('zip');
       */
       
       
       return redirect()->route('profile');
    }
}
