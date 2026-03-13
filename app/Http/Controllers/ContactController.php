<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $settings = Setting::allAsArray();
        $toEmail = $settings['email'] ?? 'info@beeandhoney.com';

        $data = $request->all();

        // Send Email
        try {
            Mail::raw(
                "Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\n\nMessage:\n{$data['message']}",
                function ($mail) use ($data, $toEmail) {
                    $mail->to($toEmail)
                         ->subject("Contact Form: " . $data['subject'])
                         ->replyTo($data['email'], $data['name']);
                }
            );

            return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
        } catch (\Exception $e) {
            Log::warning('Contact form delivery failed.', [
                'email' => $data['email'] ?? null,
                'exception' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send message. Please try again later.',
            ], 500);
        }
    }
}
