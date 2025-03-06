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
        $lists = config('nodes.available_nodes');
		$menu = [];
		foreach( $lists as $node) {
			$menu[] = [
				'label' => __('diesel.list.' . $node),
				'url'   => 'admin/node-list/' . $node,
			];
		}
        return view('layouts.admin', [
            'menu' => $menu
        ]);
    }
}
