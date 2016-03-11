<?php

namespace App\Controllers;

use Bryo\Http\Controllers\Controller;
use MongoDB\Database;

class SampleController extends Controller
{
    /**
     * @param Database $db
     * @return string
     */
    public function index(Database $db) {
        // We can access request easily.
        $request = $this->getRequest();

        $collection = $db->selectCollection('config');

        foreach ($collection->find() as $item) {
            var_dump($item->name);
        }

        return 'SampleController@index';
    }
}
