<?php

namespace App\Modules\Patient\Repositories;

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
}
