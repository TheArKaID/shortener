@section('title')
    Dashboard
@endsection

<div class="section-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update URL</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>URL</label>
                            <input class="form-control" type="text" wire:model.defer="url" placeholder="URL">
                        </div>
                        <div class="form-group">
                            <label>Short URL</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <div class="input-group-text">{{ $this_url }}</div>
                                </div>
                                <input type="text" class="form-control" wire:model.defer="short_url" placeholder="URL Anda">
                            </div>
                        </div>
                        <input type="hidden" wire:model.defer="url_id">
                        <button type="button" class="btn btn-success" wire:click="save">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
