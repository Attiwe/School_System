<?php

namespace App\Http\Controllers;

use App\Models\MyParents;
use Illuminate\Http\Request;
use Artisan;
class MyParentsController extends Controller
{


   public function dashboard()
   {
       return view('pages.MyParent.dashboard_Parent');
   }


   public function index()
   {
      $parents = MyParents::latest()->with('parentAttact')->get();
      return view('pages.MyParent.parent', compact('parents'));
   }

   public function destroy(Request $request)
   {
      // dd($request->id);
      try {
         MyParents::find($request->id)->delete();
         toastr()->success('تمت عملية المسح بنجاح');
         return redirect()->back();
      } catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


   }
}
