<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {  
        $data = array(
            'title' => 'Dashboard',
        );
        return view('livewire.dashboard',$data);
    }
}
