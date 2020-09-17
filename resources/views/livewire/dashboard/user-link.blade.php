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
                                                <td><a href="#" class="btn btn-danger">Delete</a></td>
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