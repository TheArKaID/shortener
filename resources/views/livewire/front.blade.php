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
            @if (session()->has('result'))
                <span id="result">{{ session('result') }}</span>
            @endif
        </div>
        <div>
            Ingin mengetahui seberapa banyak URL anda dibuka ? 
            <a href="">Login</a> atau <a href="">Daftar</a> Sekarang!
        </div>
    </div>
</div>

<script>
    document.getElementById('btn').onclick = function() {
        document.getElementById('result').style.display = 'none';
    }
</script>