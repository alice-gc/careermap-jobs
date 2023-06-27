<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Models\Job;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     * get all jobs from the db
     */
    public function index()
    {
        //get all jobs from db
        $all_jobs = Job::all();

        // Return a response with the list of jobs
        return view('/content/display-jobs', ['jobs' => $all_jobs]);
    }

    /**
     * Show the form for creating a new resource.
     * return view with create new job form
     */
    public function create()
    {
        return view('/content/create-job');
    }

    /**
     * Store a newly created resource in storage.
     * Take Job object as a parameter
     * Pass job through validation - JobStroeRequest
     * Return Created Job
     */
    public function store(JobStoreRequest $request)
    {
        //validate incoming data
        $validated = $request->validated();
        try {
            $job = Job::create($validated)->save();

            // Return a response with the created job
            return response()->json(['success' => true, 'job' => $job], 200);
        } catch (ValidationException $e) {
            //TODO in future
            //error message return
            // Validation failed, return the validation error messages
            // return response()->json(['success' => false, 'errors' => errors()]);
        }

    }
    /**
     * Display a listing of the resource.
     * get job by index
     */
    public function getJobByIndex($jobId)
    {
        //get job from db by id
        $job = Job::find($jobId);

        // Return not found response if failed
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }
        // Return a response with the job
        return view('/content/job', ['job' => $job]);
    }

}