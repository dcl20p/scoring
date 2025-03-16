<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('pages.contact');
    }
    
    public function submitContactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);
        
        // For now, we'll just log the contact form submission
        Log::info('Contact form submitted', $validated);
        
        // Here you would typically send an email
        // Mail::to('support@assesscrafter.com')->send(new ContactFormMail($validated));
        
        return redirect()->back()->with('success', __('Your message has been sent successfully. We will get back to you soon.'));
    }
}
