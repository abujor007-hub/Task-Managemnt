<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $task = Task::query()  ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })->latest()->paginate(5) ->withQueryString();

        return view('pages.Dashboard', compact('task'));
    }

    public function create()
    {
        return view('pages.create');
    }
}
