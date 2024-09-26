<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactFormRequest;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function form()
    {
        return view('frontend.pages.contact');
    }

    public function send(ContactFormRequest $request)
    {

        $admin = User::find(1);
        $admin->notify(new ContactNotification($admin, $request->validated()));

        if ($request->ajax()) {
            return response()->json(['message' => __('frontend.success_message')]);
        }

        return redirect()->back()->withSuccess('Mesajınız müvəffəqiyyətlə göndərilmişdir !');
    }
}
