<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapPopup;
class ViewsController extends Controller
{
    public function mapViewer() {

        $projects = mapPopup::all();
        return view('project', compact('projects'));
    }
}
