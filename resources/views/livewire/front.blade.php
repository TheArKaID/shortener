<div class="s130">
    <div class="inner">
        <div>
            <span style="font-weight: bold">Short It, Save It</span>
        </div>
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="svg-wrapper">
                    <i class="fas fa-link" style="color: #ad0000; font-size: 2em"></i>
                </div>
                <input wire:model.lazy="url" type="text" placeholder="Masukkan URL">
            </div>
            <div class="input-field second-wrap">
                <button id="btn" class="btn-submit" wire:click="short">Short!</button>
            </div>
        </div>
        <div style="width: 100%; height: 20px">
            <span wire:loading>Memproses</span>
            @if (session()->has('sukses'))
                <span id="result">{{ session('sukses') }}</span>
                <br>
                <span id="wannasave">
                    Ingin mengetahui seberapa banyak URL anda dibuka ? <br>
                    <input type="text" wire:model.defer="url" hidden>
                    <a id="log" href="#" wire:click="login">Login</a> atau <a id="log" href="#" wire:click="register">Daftar</a> Sekarang!
                </span>
            @else
                <span id="result">{{ session('gagal') }}</span>
            @endif
        </div>
    </div>
</div>

@section('styles')
    <link href="{{url('css/main.css')}}" rel="stylesheet" />
@endsection

@section('scripts')
    <script>
        document.getElementById('btn').onclick = function() {
            document.getElementById('result').style.display = 'none';
            document.getElementById('wannasave').style.display = 'inherit';
        }

        document.getElementById('log').onclick = function () {
            document.getElementById('result').style.display = 'none';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
@endsection