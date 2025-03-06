<?php

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin-clean')]
class Login extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();
        
        session()->flash('status', 'Sesión iniciada correctamente!');

        $this->redirect('/admin/account');
    }

    public function render()
    {
        // \Log::info('render Login');
        return view('livewire.pages.auth.login');
    }
}