<?php

namespace App\Repositories;

use App\Models\Appointments;
use App\Models\Specialization;
 
class AppointmentsRepository implements AppointmentsRepositoryInterface{
    public function getAllAppointments(){

        $appointments = Appointments::query()->latest()->paginate();
        return view('pages.appointments.index_appointments',compact('appointments'));
    }
    public function CreateAppointments(){
        
        $specialization = Specialization::all();
        return view('pages.appointments.create_appointments',compact('specialization')) ;
    }
    public function StoreAppointments($request){
        // dd($request->all()); 
        $data = $request->validated();
       try {
          $data['specialization_id']= $data['Specialization_id'] ;
         $data['joining_Date']= $data['joining_date'] ;
         Appointments::create($data);
        // toastr()->success('تمت الاضافه');
        return redirect()-> route('appointments.index');
       } catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }
    public function EditAppointments($id){
          $appointments = Appointments::where('id',$id)->get();
          $specializations   = Specialization::all();  

     return view('pages.appointments.edit_appointments',compact('appointments','specializations'));
    }
    public function UpdateAppointments($request){
        try {
            $appointments = Appointments::findOrFail($request->id);
            $data = $request->only(['name', 'email', 'phone', 'joining_date', 'Specialization_id' , 'address']);
            
             
             $data['specialization_id'] = $data['Specialization_id'];
            $data['joining_Date'] = $data['joining_date'];
              $appointments->update($data);
            //  toastr()->success('تمت التعديل');
             return redirect()->route('ppointments.index');   
         } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         } 
             
    }
    
    public function DeleteAppointments($id){
      
        $appointment = Appointments::findOrFail($id) ;
           if( $appointment ){
               $appointment->delete();
               toastr()->success(' تم المسح ');
               return redirect()->route('appointments.index');
           }else{
              toastr()->error('  غير موجود ');
              return redirect()->route('appointments.index');
           }
     }

}