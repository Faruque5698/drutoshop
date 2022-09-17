<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
    	return view('AdminPanel.Settings.Genarel.index');
    }

    public function email()
    {
    	return view('AdminPanel.Settings.Email.index');
    }

     public function email_templete()
    {
    	return view('AdminPanel.Settings.Templete.email');
    }
}
