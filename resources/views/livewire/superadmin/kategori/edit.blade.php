
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
        <div class="row">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <span class="text-danger">*</span>
                <input wire:model="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori">
            @error('nama_kategori')
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