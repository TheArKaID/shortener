@section('title')
    Dashboard
@endsection

<div class="section-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input wire:model.defer="url" type="text" class="form-control" placeholder="Masukkan URL" aria-label="">
                                <div class="input-group-append">
                                    <button id="btn" class="btn btn-primary" wire:click="short" type="button">Short!
                                        <span wire:loading class="fas fa-spinner"></span>
                                    </button>
                                </div>
                            </div>
                            @if (session()->has('sukses'))
                                <div id="result" class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('sukses') }}
                                    </div>
                                </div>
                            @endif
                            @if(session()->has('gagal'))
                                <div id="result" class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('gagal') }}
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
        document.getElementById('btn').onclick = function() {
            document.getElementById('result').style.display = 'none';
        }
    </script>
@endsection