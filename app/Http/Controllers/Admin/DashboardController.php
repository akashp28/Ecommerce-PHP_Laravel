<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Contact;
use App\Models\Orders;
use App\Models\ShippingInfo;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyToCustomer;

class DashboardController extends Controller
{
    public function Index()
    {
        $pendingorders = Orders::where('status', 'Pending')->get()->count();
        $completedorders = Orders::where('status', 'Confirmed')->get()->count();
        $users = User::all()->count();
        $messages = Contact::all()->count();
        $products = Product::all()->count();
        return view('admin.dashboard', compact('pendingorders', 'completedorders', 'users', 'messages', 'products'));

    }

    public function AdminLogout()
    {
        Auth::logout();
        return redirect()->route('admindashboard');
    }

    public function UserMessages()
    {
        $messages = Contact::latest()->get();
        return view('admin.messages', compact('messages'));

    }
    public function DeleteMessage($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('messages')->with('message', 'Message Deleted Successfully..!');
    }

    public function UsersList()
    {
        $users = User::where('id', '!=', 3)
            ->with('shippingInfos')
            ->withCount('orders')
            ->get(['id', 'name', 'email']);

        return view('admin.userslist', compact('users'));
    }

    public function DeleteUser($id)
    {
        ShippingInfo::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        return redirect()->route('userslist')->with('message', "User Deleted Successfully..!");
    }


    public function ReplyMessage($id)
    {
        $message = Contact::findOrFail($id);
        return view('admin.messagereply', compact('message'));
    }

    public function SendReply(Request $request, $id)
    {

        $validated = $request->validate([
            'replymessage' => 'required|string',

        ]);

        Mail::to($request->user_email)->send(new ReplyToCustomer($request->replymessage));
        $contact = Contact::findOrFail($id);
        $contact->status = 'Replied';
        $contact->save();
        return redirect()->route('messages')->with('message', 'Reply Sent Successfully.');
    }
}
