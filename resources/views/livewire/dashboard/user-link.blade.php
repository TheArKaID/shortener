@section('title')
    Link
@endsection

<div class="section-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Your URL</h4>
                    </div>
                    @if (session()->has('sukses'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{session('sukses')}}
                            </div>
                        </div>
                    @endif
                    @if (session()->has('gagal'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{session('gagal')}}
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari URL/Shorted URL Anda...." wire:model="search">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" disabled><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        @if ($links->total()===0)
                            <div class="empty-state" data-height="400" style="height: 400px;">
                                <div class="empty-state-icon bg-danger">
                                    <i class="fas fa-question"></i>
                                </div>
                                <h2>Kami tidak menemukan satupun URL anda</h2>
                                <p class="lead">
                                    Maaf kami tidak menemukan URL milik anda, pastikan setidaknya anda sudah memendekkan 1 data.
                                </p>
                                <a href="{{route('dashboard.home')}}" class="btn btn-primary mt-4">Short one!</a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th style="width: 25%">URL</th>
                                            <th>Shorted URL</th>
                                            <th>Views</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($links as $row => $link)
                                            <tr>
                                                <td>{{$links->firstItem()+$row}}</td>
                                                <td>
                                                    <a target="_blank" href="{{$link->url}}" title="" data-toggle="tooltip" data-original-title="{{$link->url}}">{{\Str::limit($link->url, 25)}}</a>
                                                </td>
                                                <td><a target="_blank" href="{{$this_url.$link->short_url}}">{{$this_url.$link->short_url}}</a></td>
                                                <td>{{$link->views}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Hapus
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -217px, 0px);">
                                                            <div class="dropdown-title">Apakah adan yakin ?</div>
                                                            <div class="dropdown-divider"></div>
                                                            <button wire:click="deleteUrl('{{$link->id}}')" class="dropdown-item bg-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('dashboard.edit-link', $link->id) }}" class="btn btn-warning">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$links->links()}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>