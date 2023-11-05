<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use \Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterPenerimaDatadiriController extends Controller
{
    public function registerPenerimaDatadiri(){
        return view('register-penerima-datadiri');
    }

}
