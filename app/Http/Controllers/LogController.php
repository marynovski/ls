<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class LogController extends Controller
{
    public function index(): View
    {
        $logs = Log::all();

        return view('admin.logs.index', ['logs' => $logs]);
    }


    public function destroy(Log $log): RedirectResponse
    {
        $log->delete();

        return redirect()->route('admin.logs.index');
    }
}
