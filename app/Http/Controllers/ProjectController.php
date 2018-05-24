<?php

namespace App\Http\Controllers;

use App\Projectt;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class ProjectController extends BaseController
{
    public function show()
    {
        $projectts = DB::table('projectts')->get();

        return view('projet', ['projectts' => $projectts]);
    }
}
