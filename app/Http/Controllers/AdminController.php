<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(AdminRequest $adminRequest)
    {
        admin::create($adminRequest->all());
   }
}
