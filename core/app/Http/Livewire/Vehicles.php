<?php

namespace App\Http\Livewire;

use App\Models\AssignVehicle;
use App\Models\User;
use App\Models\Vehicle;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class Vehicles extends Component
{

    public $vehicle_id;
    public $user_id;
    public $amount;
    public $description;
    public $status = 1;

    protected $rules = [
        'vehicle_id'    => 'required',
        'user_id'       => 'required',
        'amount'        => 'required',
    ];

    public function submit()
    {
        $this->validate();

        AssignVehicle::create([
            'vehicle_id'    => $this->vehicle_id,
            'user_id'       => $this->user_id,
            'amount'        => $this->amount,
            'description'   => $this->description,
            'status'        => $this->status,
        ]);

        
        return redirect()->route('assign.vehicle');

    }

    public function render()
    {
        $users = User::where('role_id', 2)->select('id', 'first_name', 'last_name')->get();
        $vehicles = Vehicle::select('id', 'vehicle_name')->get();
        return view('livewire.vehicles', compact('users', 'vehicles'));
    }
}
