
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-edit mr-1"></i>
            Edit {{$title}}
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
        <button wire:click="update ({{ $kategori_id }})" type="button" class="btn btn-warning">
            <i class="fas fa-edit mr-1"></i>
            Update
        </button>
      </div>
    </div>
  </div>
</div>