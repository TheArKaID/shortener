@section('title')
    Profile
@endsection

<div class="section-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    @if (session()->has('sukses'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('sukses')}}
                            </div>
                        </div>
                    @endif
                    @if (session()->has('gagal'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('gagal')}}
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" wire:model.defer="name" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" wire:model.defer="email" required="">
                            </div>
                        </div>
                        <label>Ganti Password</label>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Password Baru" wire:model.defer="new_password">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Ulangi Password" wire:model.defer="new_repassword">
                            </div>
                            <small>Abaikan jika tidak ingin Mengganti Password</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <label>Konfirmasi Password</label>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <input type="password" class="form-control" placeholder="Password" wire:model.defer="password">
                            </div>
                            <div class="formgroup col-md-2">
                                <button class="btn btn-success" wire:click="update">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>