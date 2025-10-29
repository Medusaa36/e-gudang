
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-plus mr-1"></i>
            Tambah {{$title}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mt-2">
            <label for="kategori_id" class="form-label">Pilih Kategori <span class="text-danger">*</span></label>
            <select id="kategori_id" wire:model="kategori_id" 
                class="form-control @error('kategori_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <span class="text-danger">*</span>
                <input wire:model="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukkan Nama Barang">
            @error('nama_barang')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mt-2">
                <label for="stok" class="form-label">stok</label>
                <span class="text-danger">*</span>
                <input wire:model="stok" type="number" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan stok">
            @error('stok')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times mr-1"></i>
            Close
        </button>
        <button wire:click="store" type="button" class="btn btn-success">
            <i class="fas fa-save mr-1"></i>
            Simpan
        </button>
      </div>
    </div>
  </div>
</div>