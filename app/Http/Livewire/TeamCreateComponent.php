<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyTeam;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamCreateComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $position;
    public $image;
    public $bio;
    public $email = '';
    public $facebook;
    public $linkedIn;
    public $twitter;
    public $instagram;
    public $teamId;
    public $tempImage;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount(){
        $this->teamId = request('id');
        if ($this->teamId) {
            $team = CompanyTeam::find($this->teamId);
            $this->name = $team->name;
            $this->position = $team->position;
            $this->image = $team->image;
            $this->tempImage = $team->image;
            $this->bio = $team->bio;
            $this->email = $team->email;
            $this->facebook = $team->facebook;
            $this->linkedIn = $team->linkedIn;
            $this->twitter = $team->twitter;
            $this->instagram = $team->instagram;
        }
    }

    public function render(){
        return view('livewire.team-create-component')->layout('layouts.base');
    }

    public function createTeam($bio, $position){
        $this->validate([
            'name' => 'required|min:5'
        ]);
        $positionExists = false;
        if($this->position || ($position && $position !== 'on')){
            $this->position = $this->position ?: $position;
            $positionExists = true;
        }

        if(!$positionExists){
            $this->addError('position', 'Position is required');
        }
        $errors = $this->getErrorBag();
        if(!$errors->isEmpty()){
            return;
        }
        
        $data = [
            'name' => $this->name,
            'slug'=> Str::slug($this->name),
            'position' => $this->position,
            'image' => $this->image,
            'bio' => $bio,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'linkedIn' => $this->linkedIn,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
        ];

        if ($this->teamId) {
            $team = CompanyTeam::find($this->teamId);
            $team->update($data);
            session()->flash('message', $this->name.' added to the company teams');
        } else {
            CompanyTeam::create($data);
            session()->flash('message', $this->name.'\'s information updated successfully');
        }
        redirect()->to('admin/team/list');
    }

    public function fileUpload($fileData){             
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/team/'.$pdfName,base64_decode($image));
        $this->image = 'storage/team/' . $pdfName;      
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];   
    }
}
