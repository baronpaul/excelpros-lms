<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use PDF;

use Session;

use App\Organization;

use App\TrainingProgram;

use App\CertificateTemplate;

use App\CertificateIssuance;

class AdminCertificatesController extends Controller
{
    
    protected $redirectTo = '/admin/login';
    
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public function index()
    {
        $certificates = CertificateTemplate::join('training_programs', 'training_programs.program_id', '=', 'certificate_templates.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->get();

        return view('admin.certificates.index')
        ->with('certificates', $certificates);
    }

    
    public function create()
    {
        $training_programs = TrainingProgram::all();

        return view('admin.certificates.create')
        ->with('training_programs', $training_programs);
    }

    
    public function store(Request $request)
    {
        $certificate = new CertificateTemplate;
        $certificate->program_id = $request->program_id;
        $certificate->style = $request->style;
        $certificate->save();

        Session::flash('success', 'You have successfully created a certificate');
        return redirect()->route('admin.certificates.index');
    }

    
    public function detail($id)
    {
        $certificate = CertificateTemplate::join('training_programs', 'training_programs.program_id', '=', 'certificate_templates.program_id')
        ->where('certificate_templates.certificate_id', '=', $id)->first();

        return view('admin.certificates.detail')
        ->with('certificate', $certificate);
    }

    
    public function edit($id)
    {
        $certificate = CertificateTemplate::join('training_programs', 'training_programs.program_id', '=', 'certificate_templates.program_id')
        ->where('certificate_templates.certificate_id', '=', $id)->first();

        $training_programs = TrainingProgram::all();

        return view('admin.certificates.edit')
        ->with('certificate', $certificate)
        ->with('training_programs', $training_programs);
    }

    
    public function update(Request $request)
    {
        $certificate = CertificateTemplate::where('certificate_id', $request->certificate_id)->first();
    
        $certificate->program_id = $request->program_id;
        $certificate->style = $request->style;
        $certificate->save();

        Session::flash('success', 'You have successfully updated a certificate');
        return redirect()->route('admin.certificates.index');
    }

    
    public function delete($id)
    {
        $certificate = CertificateTemplate::join('training_programs', 'training_programs.program_id', '=', 'certificate_templates.program_id')
        ->where('certificate_templates.certificate_id', '=', $id)->first();

        $training_programs = TrainingProgram::all();

        return view('admin.certificates.delete')
        ->with('certificate', $certificate)
        ->with('training_programs', $training_programs);
    }


    public function destroy(Rrequest $request)
    {
        $certificate = CertificateTemplate::where('certificate_id', $request->certificate_id)->first();
        $certificate->delete();

        Session::flash('success', 'You have successfully deleted a certificate');
        return redirect()->route('admin.certificates.index');
    }

}
