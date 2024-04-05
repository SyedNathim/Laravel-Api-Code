<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
   public function index(){
   
    $students = Students::all();
    $data = [
        'status'=>200,
        'students'=>$students
    ];
    
    return response()->json($data, 200);

   }
}
