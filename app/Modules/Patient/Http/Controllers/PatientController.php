<?php

namespace App\Modules\Patient\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Patient\Patient;
use App\Core\Http\Controllers\Controller;
use App\Modules\Patient\Http\Requests\PatientRequest;
use App\Modules\Patient\Repositories\PatientRepository;

class PatientController extends Controller
{
    protected $repository;
    
    function __construct(PatientRepository $repo)
    {
        $this->repository = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::select('id', 'full_name','email','birthday')->where('user_id', '=', \Auth::user()->id)->paginate(10); 
        return response()->json($patients, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        //

        $patient = $this->repository->storePatient($request->all());
        return response()->json($patient, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(\Auth::user(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
