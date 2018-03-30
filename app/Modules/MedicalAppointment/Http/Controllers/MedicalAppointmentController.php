<?php

namespace App\Modules\MedicalAppointment\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use App\Modules\MedicalAppointment\Repositories\MedicalAppointmentRepository;

class MedicalAppointmentController extends Controller
{
    //
    protected $repository;

    function __construct(MedicalAppointmentRepository $repo){
        $this->repository = $repo;
    }

    public function index(){
        $appointments = $this->repository->listMedicalAppointment();

        return response()->json($appointments, 200);
    }
}
