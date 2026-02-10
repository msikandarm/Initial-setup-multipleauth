<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $tab = request()->session()->get('tab', 'general');

        return view('admin.settings', [
            'title' => __('Settings'),
            'tab' => $tab,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'target_email' => ['required'],
            'website_email' => ['nullable', 'email'],
        ]);

        setting()->put('target_email', $request->target_email);
        setting()->put('website_email', $request->website_email);
        setting()->put('website_phone', $request->website_phone);
        setting()->put('website_address', $request->website_address);

        return back()
            ->with('success', __('Settings updated successfully.'))
            ->with('tab', 'general');
    }

    public function updateSocial(Request $request)
    {
        setting()->put('facebook', $request->facebook);
        setting()->put('twitter', $request->twitter);
        setting()->put('instagram', $request->instagram);
        setting()->put('youtube', $request->youtube);

        return back()
            ->with('success', __('Settings updated successfully.'))
            ->with('tab', 'social');
    }

    public function updateSmtp(Request $request)
    {
        $request->validate([
            'smtp_host' => ['required'],
            'smtp_username' => ['required'],
            'smtp_password' => ['required'],
            'smtp_port' => ['required'],
            'smtp_encryption' => ['required'],
        ]);

        setting()->put('smtp_host', $request->smtp_host);
        setting()->put('smtp_username', $request->smtp_username);
        setting()->put('smtp_password', $request->smtp_password);
        setting()->put('smtp_port', $request->smtp_port);
        setting()->put('smtp_encryption', $request->smtp_encryption);
        setting()->put('smtp_from_email', $request->smtp_from_email);

        return back()
            ->with('success', __('Settings updated successfully.'))
            ->with('tab', 'smtp');
    }
}
