<?php

namespace Bryo\Http\Controllers\Admin;

use Bryo\Http\Controllers\Controller;

class BryoAdminController extends Controller
{
    public function index() {
        return view('admin.index', [
            'structure' => $this->structure
        ]);
    }

    public function listContent($type) {
        // Checks if the type you are visiting exists.
        // Not found (404) error is raised otherwise.
        if (!$this->isValidCollection($type)) {
            abort(404);
        }

        // Fetch all the documents in the collection.
        $documents = $this->db->{$type}->find();

        return view('admin.list', [
            'type' => $this->structure[$type],
            'documents' => $documents
        ]);
    }
}
