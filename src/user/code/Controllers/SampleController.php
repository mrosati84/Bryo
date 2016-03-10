<?php

namespace App\Controllers;

use Bryo\Http\Controllers\Controller;

class SampleController extends Controller
{
    public function index() {
        // We can access request easily.
        $request = $this->getRequest();

        return 'SampleController@index';
    }
}
