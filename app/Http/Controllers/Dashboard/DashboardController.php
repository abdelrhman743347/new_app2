<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware(['role:super_admin']);
    }
    
    public function index()
    {
    	return view('dashboard.index');
    		
    }//end of index
}
