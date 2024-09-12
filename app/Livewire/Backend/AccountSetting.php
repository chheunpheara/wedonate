<?php

namespace App\Livewire\Backend;

use App\Models\User;
use App\Models\UserProfilePhoto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountSetting extends Component
{
    use WithFileUploads;
    
    public $name;
    public $email;

    public $password;
    public $password_confirmation;

    public $userID;
    public $profilephoto;
    public $avatar;

    public $nameEditRequested = false;
    public $emailEditRequested = false;

    public function mount() {
        $user = User::where('id', Auth()->user()->id)->first();
        $this->userID = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->avatar = $user->profilephoto->photo ?? null;
    }

    public function render()
    {
        return view('livewire.backend.account-setting');
    }

    public function editName() {
        $this->nameEditRequested = true;
    }

    public function editEmail() {
        $this->emailEditRequested = true;
    }

    public function updateName() {
        $this->validate(['name' => 'required']);
        $this->nameEditRequested = false;
        User::where('id', $this->userID)->update(['name' => $this->name]);
    }

    public function updatePassword() {
        $this->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
        User::where('id', $this->userID)->update(['password' => Hash::make($this->password)]);
        session()->flash('success', 'Password has been updated');
        $this->password = $this->password_confirmation = '';
    }

    public function updatedProfilephoto() {
        $this->validate(['profilephoto' => 'mimes:jpeg,jpg,png|max:2048']);
        $avatar = $this->profilephoto->hashName();
        if ($this->avatar) {
            UserProfilePhoto::where('user_id', $this->userID)->update(['photo' => $avatar]);
        } else {
            UserProfilePhoto::create(['photo' => $avatar, 'user_id' => $this->userID]);
        }

        $this->profilephoto->store(path: 'public/resource/images');
        $user = User::where('id', Auth()->user()->id)->first();
        if ($this->avatar) {
            Storage::delete($this->avatar);
        }
        $this->avatar = $user->profilephoto->photo ?? null;
    }
}
