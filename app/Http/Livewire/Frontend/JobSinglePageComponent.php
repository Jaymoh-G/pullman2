<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Job;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Models\JobApplication;
use App\Mail\JobApplicationSuccess;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JobSinglePageComponent extends Component{
    use WithFileUploads;
    public $job;
    public $jobId;
    public $jobSlug;
    public $categories;
    public $name;
    public $email;
    public $telephone;
    public $cover_letter_path;
    public $cv_path;
    public $other_doc_path = [];
    public $education_qualification;
    public $professional_information;
    public $showForm = false;
    public $file_id;
    public $errors = [];
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount($slug){
        $this->jobSlug = request('slug');
        $this->job = Job::where('slug', $this->jobSlug)->first();
        $this->jobId = $this->job->id;
        $this->categories = Category::all();
    }

    public function render(){
        $Jobs = Job::all();
        return view('livewire.frontend.job-single-page-component',['Jobs'=>$Jobs])->layout('layouts.web',);
    }

    public function apply($id){        
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:job_applications',
            'telephone' => 'required|numeric|digits_between:10,15|unique:job_applications',
            'education_qualification' => 'required',
            'professional_information' => 'required',
        ],[
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'telephone.required' => 'Telephone is required',
            'telephone.numeric' => 'Telephone format 254xxxxxxxxx',
            'telephone.digits_between' => 'Telephone format 254xxxxxxxxx',
            'education_qualification.required' => 'Education qualification is required',
            'professional_information.required' => 'Professional information is required'
        ]);

        if(!$this->cover_letter_path){
            $this->errors['cover_letter_path'][] = 'Cover letter is required';
        }else{
            if(isset($this->errors['cover_letter_path'])){
                foreach($this->errors['cover_letter_path'] as $key=>$error){
                    if($error == 'Cover letter is required'){
                        unset($this->errors[$this->file_id][$key]);
                    }
                }
            }            
        }
        if(!$this->cv_path){
            $this->errors['cv_path'][] = 'CV is required';
        }else{
            if(isset($this->errors['cv_path'])){
                foreach($this->errors['cv_path'] as $key=>$error){
                    if($error == 'CV is required'){
                        unset($this->errors[$this->file_id][$key]);
                    }
                }
            }            
        }
        if(!$this->other_doc_path){
            $this->errors['other_doc_path'][] = 'Other documents is required';
        }else{
            if(isset($this->errors['other_doc_path'])){
                foreach($this->errors['other_doc_path'] as $key=>$error){
                    if($error == 'Other documents is required'){
                        unset($this->errors[$this->file_id][$key]);
                    }
                }
            }
        }
        if(array_filter($this->errors)){  
            foreach($this->errors as $error=>$errorMessages){
                if(count($errorMessages) > 0){
                    foreach($errorMessages as $key=>$message){
                        $this->addError($error, $message);
                    }
                }                
            }
            return;
        }
        // save data
        $jobApplication = new JobApplication();
        $jobApplication->job_id = $this->jobId;
        $jobApplication->name = $this->name;
        $jobApplication->telephone = $this->telephone;
        $jobApplication->email = $this->email;
        $jobApplication->professional_information = $this->professional_information;
        $jobApplication->education_qualification = $this->education_qualification;
        $jobApplication->cv_path = $this->cv_path;
        $jobApplication->cover_letter_path = $this->cover_letter_path;
        $jobApplication->other_doc_path = count($this->other_doc_path) > 0 ? serialize($this->other_doc_path) : null;
        $jobApplication->save();
        $this->resetInput();
        session()->flash('message', 'Job application was successfully sent');
        // send success application mail
        $job = Job::find($this->jobId);
        $dateToday = date('Y-m-d H:i:s');
        Mail::to('info@pullmanexcavatorskenya.com')->send(new JobApplicationSuccess($this->name, $job->title , $this->email, $dateToday));
        redirect()->to(route('frontend.careers.details', $this->jobSlug));
    }

    public function resetInput(){
        $this->name = '';
        $this->email = '';
        $this->telephone = '';
        $this->cover_letter_path = '';
        $this->cv_path = '';
        $this->other_doc_path = '';
    }

    public function fileUpload($fileData){
        $this->validatePdf($this->fileExtension);
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        if($this->fileExtension == 'docx'){
            $fileData = str_replace('data:application/vnd.openxmlformats-officedocument.wordprocessingml.document;base64,', '', $fileData);
        }else if($this->fileExtension == 'doc'){
            $fileData = str_replace('data:application/msword;base64,', '', $fileData);
        }else if($this->fileExtension == 'pdf'){
            $fileData = str_replace('data:application/pdf;base64,', '', $fileData);
        }
        $fileData = str_replace(' ', '+', $fileData);
        Storage::disk('public')->put('/jobApplications/'.$pdfName,base64_decode($fileData));

        if($this->file_id == 'cover_letter_path'){
            $this->cover_letter_path = 'storage/jobApplications/' . $pdfName;
        }elseif($this->file_id == 'cv_path'){
            $this->cv_path = 'storage/jobApplications/' . $pdfName;
        }elseif($this->file_id == 'other_doc_path'){
            $this->other_doc_path[] = 'storage/jobApplications/' . $pdfName;
        }
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];
        $this->file_size = $fileData['file_size'];
        $this->file_id = $fileData['id'];
    }

    public function validatePdf($extension){        
        if($extension !== 'pdf' && $extension !== 'doc' && $extension !== 'docx'){
            $this->errors[$this->file_id][] = 'Invalid document type. Only pdf, doc and docx are allowed';
        }else{
            if(isset($this->errors[$this->file_id])){
                foreach($this->errors[$this->file_id] as $key=>$error){
                    if($error == 'Invalid document type. Only pdf, doc and docx are allowed'){
                        unset($this->errors[$this->file_id][$key]);
                    }
                }
            }
            
        }
    }
}
