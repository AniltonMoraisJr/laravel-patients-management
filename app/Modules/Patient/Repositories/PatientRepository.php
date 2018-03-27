<?php

namespace App\Modules\Patient\Repositories;

use App\Modules\Patient\Patient;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Interface PatientRepository.
 *
 * @package namespace App\Repositories;
 */
class PatientRepository extends BaseRepository
{
    //

    function model()
    {
        return "App\\Modules\\Patient\\Patient";
    }
    
    public function storePatient(array $aPatient)
    {
        $patient = new Patient();
        $patient->full_name = $aPatient['full_name'];
        $patient->email = $aPatient['email'];
        $patient->birthday = $aPatient['birthday'];
        $patient->genre = $aPatient['genre'];
        $patient->address_one = $aPatient['address_one'];
        $patient->address_two = $aPatient['address_two'];
        $patient->zip_code = $aPatient['zip_code'];
        $patient->country = $aPatient['country'];
        $patient->state = $aPatient['state'];
        $patient->city = $aPatient['city'];
        $patient->phone = $aPatient['phone'];
        $patient->user_id = \Auth::user()->id;

        $patient->save();

        return $patient;

    }
    public function listPatients()
    {
        $patients = Patient::select('id', 'full_name','email','birthday')->where('user_id', '=', \Auth::user()->id)->paginate(5); 
        return $patients; 
    }
}
