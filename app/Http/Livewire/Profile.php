<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class  Profile extends Component
{
    public $success = false;

    public $name;
    public $email;
    public $user_id;//parameter

    //instead of variables we can use an object
    //if variables are coming from one object use an object
    //for an object to work ensure to include the validation rules
    //if there are multiple objects involved, you can use them as well
    public $user;//binding a object
    public $showHelp = false;

    //any property of the object that you want to bind,you need to add them to validation rules
    protected $rules = [
        'user.name' => 'min:3',
        'user.email' => 'email',
    ];

    //works like a constructor
    public function mount()
    {
//        $this->name = auth()->user()->name;
//        $this->email = auth()->user()->email;
        $this->user = auth()->user();

        //if receiving parameters to the component
        //via blade
//        $this->user = User::find($this->user_id);

        //via request or query param
//        $this->user = User::find(request('user_id'));
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function submit()
    {
        $this->validate();

//        auth()->user()->update([
//            'name' => $this->name,
//            'email' => $this->name
//        ]);

        /*
         * you do not need to pass any parameters,livewire will know the fields becos of the array of rules
         * if using you are bining the entire object
         * */
        $this->user->save();

        $this->success = true;

        $this->emit('profileUpdated');//fires an event
//        $this->emit('profileUpdated',3);//fires an event with param
    }

    //hooks
    //will listen to any updates on any property of the component
    public function updated($name,$value){

        if($name == "name"){
            //$this->validate(['name' => 'min:3']);
            //$this->validateOnly('name',['name' => 'min:3']);//validate with some rules
            $this->validateOnly('name');//validate with global rules
        }

    }

    //instead of the above method
    //shorter
    public function updatedName()//variable
    {
        $this->validateOnly('name');
    }
    public function updatedUserName()//object
    {
        $this->validateOnly('user.name');
    }

    //redundant
    //can be done in the view
    public function toggleHelp(){
        $this->showHelp = !$this->showHelp;
    }

}
