<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Xhgui\Profiler\Profiler;

class UserController extends Controller
{
    private array $config;
    private Profiler $profiler;


    public function __construct()
    {
        $this->config = Config::get('saver');
        $this->profiler = new Profiler($this->config);
    }


    public function index(): View
    {
        $this->profiler->start();

        $users = User::all();

        $profiler_data = $this->profiler->disable();
        $this->profiler->save($profiler_data);

        return view('users', ['users' => $users]);
    }

    public function cyclomatic(): View
    {
        $users = User::all();
        $this->profiler->start();
        $size = 15;

        for ($i = 0; $i < $size; $i++) {
            User::all();
        }

        $profiler_data = $this->profiler->disable();
        $this->profiler->save($profiler_data);

        return view('users', ['users' => $users]);
    }

    public function show(): View
    {
        $this->profiler->start();

        $users = User::all();

        $profiler_data = $this->profiler->disable();
        $this->profiler->save($profiler_data);

        return view('user', ['user' => $users[0]]);
    }

    public function first(): View
    {
        $this->profiler->start();

        $users = User::first();

        $profiler_data = $this->profiler->disable();
        $this->profiler->save($profiler_data);

        return view('user', ['user' => $users]);
    }
}
