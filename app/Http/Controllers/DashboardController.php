<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use function PHPUnit\Framework\returnSelf;

class DashboardController extends Controller
{
    public function index()
    {
        $props = $this->getDashboardProps(Auth::user()->role->id);

        return Inertia::render('Dashboard', [
            'dashboardData' => $props,
        ]);
    }

    private function getDashboardProps(int $roleID)
    {
        switch ($roleID)
        {
            case 1: // is an admin
                return $this->adminProps();

            case 2: // is an school director
                return $this->directorProps();

            case 3: // is a professor
                return $this->professorProps();

            case 4: // is an student
                return $this->studentProps();

            default:
                return [];
        }
    }

    private function adminProps()
    {
        $noAdminUsers = User::all();
        $schools = School::all();
        $students = Student::all();
        $professors = Professor::all();

        /*
        dd([
            'numUsers'      => $noAdminUsers->count(),
            'numSchools'    => $schools->count(),
            'numStudents'   => $students->count(),
            'numProfessors' => $professors->count(),
        ]);
        */

        return [
            'numUsers'      => $noAdminUsers->count(),
            'numSchools'    => $schools->count(),
            'numStudents'   => $students->count(),
            'numProfessors' => $professors->count(),
        ];
    }

    private function directorProps()
    {
        return [];
    }

    private function professorProps()
    {
        return [];
    }

    private function studentProps()
    {
        return [];
    }
}
