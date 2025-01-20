<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentsRequest;
use App\Models\Appointments;
use App\Repositories\AppointmentsRepositoryInterface;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
   public $Appointments;

   public function __construct(AppointmentsRepositoryInterface $appointments)
    {
       $this->Appointments = $appointments;
    }
    public function index()
    {
     return $this->Appointments->getAllAppointments();
    }

    public function create()
    {
        return  $this->Appointments->CreateAppointments();
    }

    public function store(AppointmentsRequest $request)
    {
        return $this->Appointments->StoreAppointments(  $request);
    }
 
    public function edit($id)
    {
          return $this->Appointments->EditAppointments($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    {
       return $this->Appointments->UpdateAppointments($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(Request $request)
    {
       return  $this->Appointments->DeleteAppointments( $request->id);
    }
   
}
