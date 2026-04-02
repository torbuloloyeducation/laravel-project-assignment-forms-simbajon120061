<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    // Display the list
    public function index() {
        return view('formtest', [
            'emails' => session()->get('emails', [])
        ]);
    }

    // Handle the submission
    public function store(Request $request) {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $emails = session()->get('emails', []);

        if (in_array($request->email, $emails)) {
            return back()->with('error', 'Email already exists.');
        }

        if (count($emails) >= 5) {
            return back()->with('error', 'Maximum limit of 5 emails reached.');
        }

        session()->push('emails', $request->email);

        return back()->with('success', 'Email added!');
    }

    // Delete a specific email
    public function destroy($index) {
        $emails = session()->get('emails', []);

        if (isset($emails[$index])) {
            unset($emails[$index]);
            session()->put('emails', array_values($emails));
        }

        return back()->with('success', 'Email removed.');
    }

    // Clear the entire list
    public function clear() 
    {
        session()->forget('emails');

        return back()->with('success', 'All emails have been cleared!');
    }
}
