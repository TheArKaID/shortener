@section('title')
    Dashboard
@endsection

<div class="section-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Short URL</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input id="url" wire:model.defer="url" type="text" class="form-control" placeholder="Masukkan URL" aria-label="">
                                <div class="input-group-append">
                                    <button id="btn" class="btn btn-danger" wire:click="short" type="button">Short!
                                        <span wire:loading wire:target="short" class="fas fa-spinner"></span>
                                    </button>
                                </div>
                            </div>
                            @if (session()->has('sama'))
                                <div class="form-group">
                                    <a id="open_url" target="_blank" href="{{$url}}" class="btn btn-success btn-icon icon-left">
                                        <i class="fas fa-link"></i> {{$url}}
                                    </a>
                                    <a href="#" class="btn btn-warning" onclick="custom_url()">Custom URL</a>
                                </div>
                                <div id="input_custom_url" class="form-group" style="display: none">
                                    <div class="input-group mb-3">
                                        <input wire:model.defer="custom_url" id="custom_url" type="text" class="form-control" placeholder="Ubah URL" aria-label="">
                                        <div class="input-group-append">
                                            <button id="btn" class="btn btn-danger" wire:click="customURL" type="button">Simpan!
                                                <span wire:loading wire:target="customURL" class="fas fa-spinner"></span>
                                            </button>
                                            <button id="btn-cancel" onclick="cancelCustom()" class="btn btn-secondary">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session()->has('sukses'))
                                <div id="result">
                                    <div class="form-group">
                                        <a id="open_url" target="_blank" href="{{$url}}" class="btn btn-success btn-icon icon-left">
                                            <i class="fas fa-link"></i> {{$url}}
                                        </a>
                                        <a href="#" class="btn btn-warning" onclick="custom_url()">Custom URL</a>
                                    </div>
                                    <div id="input_custom_url" class="form-group" style="display: none">
                                        <div class="input-group mb-3">
                                            <input wire:model.defer="custom_url" id="custom_url" type="text" class="form-control" placeholder="Ubah URL" aria-label="">
                                            <div class="input-group-append">
                                                <button id="btn" class="btn btn-danger" wire:click="customURL" type="button">Simpan!
                                                    <span wire:loading wire:target="customURL" class="fas fa-spinner"></span>
                                                </button>
                                                <button id="btn-cancel" onclick="cancelCustom()" class="btn btn-secondary">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            {{ session('sukses') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(session()->has('gagal') || session()->has('sama'))
                                <div id="result" class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('gagal') ?? session('sama') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        function custom_url() {
            $('#input_custom_url').css("display","inherit");
            $('#url').prop('disabled', true);
            $('#btn').prop('disabled', true);
        }
        function cancelCustom() {
            $('#input_custom_url').hide();
            $('#url').prop('disabled', false);
            $('#btn').prop('disabled', false);
        }
        document.getElementById('btn').onclick = function() {
            document.getElementById('result').style.display = 'none';
        }
    </script>
@endsection