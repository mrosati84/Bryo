<?php

namespace App\Controllers;

use Bryo\Http\Controllers\Controller;
use Bryo\Database\Contracts\Database;

class SampleController extends Controller
{
    public function index(Database $db) {
        // We can access request easily.
        $request = $this->getRequest();

        // Connect to the database using
        // injected database implementation.
        $db->connect();

        return 'SampleController@index';
    }
}
