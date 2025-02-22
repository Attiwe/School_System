<?php

namespace App\Http\Controllers;
use App\Trait\AuthenticatTrait;
use Auth;
use Illuminate\Http\Request;



class AuthenticatedController extends Controller
{
   use AuthenticatTrait;
   public function index()
   {
      return view('auth.selection');

   }

   public function loginForm($type)
   {
      return view('auth.login', compact('type'));
   }


   public function login(Request $request)
   { 
      try {
          $guard = $this->checkGuard($request);

          if (Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password])) {
            session()->forget('loginAttempts');  
            return $this->redirectPages($request);
            
         } 

          $attempts = session()->get('loginAttempts', 0) + 1;
         session()->put('loginAttempts', $attempts);

         if ($attempts > 2) {
            toastr()->error('بس يلا متحولش');
            return view('404');  
         }

          toastr()->warning('البريد الإلكتروني أو كلمة المرور غير صحيحة.');
         return redirect('/') ;

      } catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
   }



   public function logout(Request $request, $type)
   {

      try {
         Auth::guard($type)->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         toastr()->success('تم تسجيل الخروج بنجاح');
         return redirect('/');
      } catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

   }

}
