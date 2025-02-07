<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $menu = [
            [
                'type' => 'navigate',
                'name' => 'Dashboard',
                'url' => 'admin/dashboard',
                'type_icon' => 'feather',
                'icon' => 'home'
            ],
            [
                'type' => 'navigate',
                'name' => 'Cuenta',
                'url' => 'admin/account',
                'type_icon' => 'feather',
                'icon' => 'user'
            ],
            [
                'type' => 'divider',
                'name' => 'Páginas',
            ],
        ];
        return view('layouts.admin', [
            'menu' => $menu
        ]);
    }
}
