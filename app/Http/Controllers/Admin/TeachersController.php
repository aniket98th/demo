<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller {
   public function index() {
      $teachers = Teacher::paginate(10);
      return view('admin.teachers.index', compact('teachers'));
   }
}
