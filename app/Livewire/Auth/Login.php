<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user || !Hash::check($this->password, $user->password)) {
            session()->flash('error', 'Email atau password salah!');
            return;
        }

        Auth::login($user);

       if ($user->role === 'Super Admin') {
            return redirect()->route('superadmin.user.index');
        } elseif ($user->role === 'Admin') {
            return redirect()->route('admin.barang.index');
        } else {
            return redirect()->route('dashboard');
        }

    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.login');
    }
}
