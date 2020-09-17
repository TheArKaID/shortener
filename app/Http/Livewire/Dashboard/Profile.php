<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $email;
    public $name;
    public $password;

    public $new_password;
    public $new_repassword;
    public function render()
    {
        return view('livewire.dashboard.profile')->extends('layouts.main');
    }

    public function mount()
    {
        $user = \Auth::user();
        $this->email = $user->email;
        $this->name = $user->name;   
    }

    public function update()
    {
        $user = \Auth::user();
        if($this->password) {
            if(!password_verify($this->password, $user->password)) {
                session()->flash('gagal', 'Password Lama anda Salah!');
                return redirect(route('dashboard.profile'));
            }
        } else {
            session()->flash('gagal', 'Password Lama Harus Diisi!');
            return redirect(route('dashboard.profile'));
        }
        
        if($this->new_password || $this->new_repassword) {
            if($this->new_password!==$this->new_repassword) {
                session()->flash('gagal', 'Password Baru Tidak Sama!');
                return redirect(route('dashboard.profile'));
            } else {
                $user->password = \Hash::make($this->new_password);
            }
        }

        if($this->email!==$user->email) {
            $checkemail = User::where('email', $this->email)->first();
            if($checkemail) {
                session()->flash('gagal', 'Email yang anda masukkan telah Terdaftar!');
                return redirect(route('dashboard.profile'));
            }
        }

        $user->email = $this->email;
        $user->name = $this->name;
        $user->save();

        $this->password = '';
        $this->new_password = '';
        $this->new_repassword = '';

        session()->flash('sukses', 'Data anda berhasil Diperbaharui!');
        return redirect(route('dashboard.profile'));
    }
}
