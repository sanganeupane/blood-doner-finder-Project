<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $frontendPath='frontend.';
    public  $pagePath='';
 public function __construct()  
             {
                 $this->data('title','Donate Blood');

                 $this->pagePath= $this->frontendPath.'pages.';
//echo  $this->pagePath;
            }
}
//public function __construct()
//{
//    $this->middleware('auth:web');
//}
