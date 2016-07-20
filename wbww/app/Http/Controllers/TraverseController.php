<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
/**
* Controller meant for initial traversal around the site. Other more
* advance controllers will handle common paths in the future (like AlleyController)
*
*/
class TraverseController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showMainPage()
    {
        return view('pages.newHome');
    }

    public function faqsPage()
    {
            return view ('pages.faqs');
    }

    public function loginPage()
    {
            return view ('users.loginStart');
    }
}