<?php

namespace App\Trait;
trait AuthenticatTrait
{
     public function checkGuard($request)
     {
          if ($request->type == 'student') {
               $guardName = 'student';
          } elseif ($request->type == 'teacher') {
               $guardName = 'teacher';
          } elseif ($request->type == 'parent') {
               $guardName = 'parent';
          } else {
               $guardName = 'web';
          }
          return $guardName;
     }
     public function redirectPages($request)
     {
          if ($request->type == 'student') {
               return redirect()->route('student-dashboard');
          } elseif ($request->type == 'teacher') {
               return redirect()->route('teacher-dashboard');
          } elseif ($request->type == 'parent') {
               return redirect()->route('parent-dashboard');
          } else {
               return redirect()->route('dashboard');
          }

     }
 

 
}
