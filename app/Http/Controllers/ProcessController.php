<?php

namespace App\Http\Controllers;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
	protected $url;

	public function __construct(UrlGenerator $url) {
		$this->prev = $url->previous();
	}

    public function postContactForm( Request $request ) {
        $form = new \App\Models\Form;
        $form->name     = $request->name;
        $form->email    = $request->email;
        $form->phone    = $request->phone;
        $form->subject  = $request->subject;
        $form->comments = $request->comments;
        $form->save();
        return redirect($this->prev)->with('message_success', __('diesel.form_success'));
    }
}
