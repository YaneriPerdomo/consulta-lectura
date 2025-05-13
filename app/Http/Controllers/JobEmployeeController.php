<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use DB;
use Illuminate\Http\Request;

class JobEmployeeController extends Controller
{
   public function index()
   {
      $jobs = Job::Paginate(7);
       
      return view('admin.human-resources.job.show-all', ['jobs' => $jobs]);
   }

   public function create()
   {
      return view('admin.human-resources.job.create');
   }

   public function store(JobRequest $request)
   {

      $slug = converter_slug($request->job);

      $new_job = new Job();
      $new_job->job = $request->job;
      $new_job->description = $request->description;
      $new_job->slug = $slug;
      $new_job->save();

      $request->session()->flash(
         'alert-success',
         'El cargo ha sido registrado exitosamente.'
      );

      return redirect('recursos-humanos/cargos');
   }

   public function edit($name)
   {
      $data_job = Job::where('slug', $name)->first();
     
      return view('admin.human-resources.job.edit', ['data_job' => $data_job]);
   }

   public function update(Request $request, $slug_url)
   {
      $slug_update = converter_slug($request->job);
      $data_job = Job::where('slug', $slug_url)->first();
     
      $data_job->job = $request->job; 
      $data_job->description = $request->description;
      $data_job->slug = $slug_update;
      $data_job->save();

      $request->session()->flash(
         'alert-success',
         'El cargo ha sido acutalizado exitosamente.'
      );

      return redirect('recursos-humanos/cargo/' . $slug_update . '/editar');
   }

   public function showDeleteAccount($slug_url)
   {

      return view('admin.human-resources.job.delete', ['slug_url' => $slug_url]);
   }
}
