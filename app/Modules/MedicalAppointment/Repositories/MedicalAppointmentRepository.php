<?php

namespace App\Modules\MedicalAppointment\Repositories;

use App\Modules\MedicalAppointment\MedicalAppointment;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Interface MedicalAppointmentRepository.
 *
 * @package namespace App\Repositories;
 */
class MedicalAppointmentRepository extends BaseRepository
{
    //

    function model()
    {
        return "App\\Modules\\MedicalAppointment\\MedicalAppointment";
    }
    
    public function storeMedicalAppointment(array $aMedicalAppointment)
    {
        

        return ;

    }
    public function listMedicalAppointment()
    {
        $medicalappointment = MedicalAppointment::select('id', 'title','start','end')->where('user_id', '=', \Auth::user()->id)->paginate(5); 
        return $medicalappointment; 
    }
}
