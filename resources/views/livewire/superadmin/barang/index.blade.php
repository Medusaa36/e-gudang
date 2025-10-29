<div>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <i class="fas fa-warehouse mr-2"></i>
              {{$title}}
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{ route ('dashboard') }}">
                  <i class="fas fa-home mr-1"></i>Dashboard
                </a>
              </li>
              <li class="breadcrumb-item active">
                <i class="fas fa-warehouse mr-1"></i>
                {{$title}}
              </li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div>
              <button wire:click="create" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus mr1"></i>
                Tambah {{$title}}
              </button>
            </div>
            <div class="btn-group dropleft">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-print mr-1"></i>
                Cetak
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item text-success" href="#">
                  <i class="fas fa-file-excel"></i>
                  Excel
                </a>
                <a class="dropdown-item text-danger" href="#">
                  <i class="fas fa-file-pdf mr-1"></i>
                  PDF
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div class="col-1">
              <select wire:model.live='paginate' class="form-control text-center">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
            <div class="col-3">
              <input wire:model.live="search" type="text" placeholder="Pencarian...." class="form-control">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover text-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>
                    <i class="fas fa-cog"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($barang as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->nama_kategori}}</td>
                      <td>{{$item->nama_barang}}</td>
                      <td>{{$item->stok}}</td>
                      <td>
                        <button wire:click="edit({{ $item->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="confirm({{ $item->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            {{ $barang->links() }}
          </div>
        </div>
      </div>
    </section>

    @include('livewire.superadmin.barang.create')
    
    @include('livewire.superadmin.barang.edit')
    
    @script
    <script>
        $wire.on('closeCreateModal', () => {
            $('#createModal').modal('hide');
            Swal.fire({
              title: "Sukses",
              text: "Data Barang Berhasil Ditambahkan",
              icon: "success"
            });
        });
    </script>
    @endscript
    @script
    <script>
        $wire.on('closeEditModal', () => {
            $('#editModal').modal('hide');
            Swal.fire({
              title: "Sukses",
              text: "Data Barang Berhasil Di Edit",
              icon: "success"
            });
        });
    </script>
    @endscript
    
    @include('livewire.superadmin.barang.delete')
    
    @script
    <script>
        $wire.on('closeDeleteModal', () => {
            $('#deleteModal').modal('hide');
            Swal.fire({
              title: "Sukses",
              text: "Data Barang Berhasil Di Hapus",
              icon: "success"
            });
        });
    </script>
    @endscript
  </div>

</div>
