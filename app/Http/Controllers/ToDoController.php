<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteToDoItem;
use Inertia\Inertia;

class ToDoController extends Controller {

    public function __construct() {

        $this->middleware('admin');
    }

    public function index() {

        $items = SiteToDoItem::orderBy('priority')->get();

        return Inertia::render('ToDo/Index', ['items' => $items]);
    }

    public function create() {

        return Inertia::render('ToDo/Create');
    }

    public function store(Request $request) {

        SiteToDoItem::create([
            'priority' => $request->priority,
            'description' => $request->description,
            'url' => $request->url
        ]);

        return redirect(route('toDo'));
    }

    public function show($id) {

        var_dump("show");exit;
    }

    public function edit($id) {

        var_dump("edit");exit;
    }

    public function update(Request $request, $id) {

        var_dump("update");exit;
    }

    public function destroy($id) {

        var_dump("destroy");exit;
    }
}
