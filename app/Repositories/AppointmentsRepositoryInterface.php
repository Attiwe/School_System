<?php 
namespace App\Repositories;

use App\Http\Requests\AppointmentsRequest;

interface AppointmentsRepositoryInterface{
    //get all Appointments
    public function getAllAppointments();

    //get create
    public function CreateAppointments();
    
    //stor appointments
    public function StoreAppointments(AppointmentsRequest $request);

    public function EditAppointments($id);
    public function UpdateAppointments($request);

    public function DeleteAppointments($id);
     
}