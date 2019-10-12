<?php

namespace SCCatalog\Http\Controllers\Frontend;

use SCCatalog\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use SCCatalog\Mail\Frontend\Contact\SendContact;
use SCCatalog\Http\Requests\Frontend\Contact\SendContactRequest;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return view('frontend.contact');
        return redirect('https://sustainabilityconnect.asu.edu/about/contact-us/');
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        Mail::send(new SendContact($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    }
}
