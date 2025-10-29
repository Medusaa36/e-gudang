<?php

namespace App\Livewire\Superadmin\Barang;

use App\Models\barang;
use App\Models\kategori;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $paginate="10";
    public $search='';

    public $nama_barang, $stok, $nama_kategori, $barang_id, $kategori_id;
    public $kategoris;

    public function mount()
    {
        $this->kategoris = Kategori::all();
    }
    public function render()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => Barang::join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
                ->where('barangs.nama_barang', 'like', '%' . $this->search . '%')
                ->orWhere('kategoris.nama_kategori', 'like', '%' . $this->search . '%')
                ->orderBy('barangs.stok', 'asc')
                ->select('barangs.*', 'kategoris.nama_kategori')
                ->paginate($this->paginate),
        ];

        return view('livewire.superadmin.barang.index', $data);
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset([
            'nama_barang',
            'stok',
            'kategori_id',
        ]);
    }

    public function store()
    {
        $this->validate([
            'nama_barang' => 'required|unique:barangs,nama_barang',
            'stok'        => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.unique'   => 'Nama barang sudah terdaftar',
            'stok.required'        => 'Stok tidak boleh kosong',
            'stok.integer'         => 'Stok harus berupa angka',
            'stok.min'             => 'Stok minimal 0',
            'kategori_id.required' => 'Kategori harus dipilih',
            'kategori_id.exists'   => 'Kategori tidak valid',
        ]);

        $barang = new Barang;
        $barang->nama_barang = $this->nama_barang;
        $barang->stok        = $this->stok;
        $barang->kategori_id = $this->kategori_id;
        $barang->save();

        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $barang = Barang::findOrFail($id);

        $this->barang_id    = $barang->id;
        $this->nama_barang  = $barang->nama_barang;
        $this->stok         = $barang->stok;
        $this->kategori_id  = $barang->kategori_id;
    }

    public function update($id)
    {
        $barang = Barang::findOrFail($id);

        $this->validate([
            'nama_barang' => 'required|unique:barangs,nama_barang,' . $id,
            'stok'        => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.unique'   => 'Nama barang sudah terdaftar',
            'stok.required'        => 'Stok tidak boleh kosong',
            'stok.integer'         => 'Stok harus berupa angka',
            'stok.min'             => 'Stok minimal 0',
            'kategori_id.required' => 'Kategori harus dipilih',
            'kategori_id.exists'   => 'Kategori tidak valid',
        ]);

        $barang->nama_barang = $this->nama_barang;
        $barang->stok        = $this->stok;
        $barang->kategori_id = $this->kategori_id;
        $barang->save();

        $this->dispatch('closeEditModal');
    }

    public function confirm($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);

        $this->barang_id     = $barang->id;
        $this->nama_barang   = $barang->nama_barang;
        $this->stok          = $barang->stok;
        $this->kategori_id   = $barang->kategori_id;
        $this->nama_kategori = $barang->kategori->nama_kategori ?? '-';
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        $this->dispatch('closeDeleteModal');
    }
}
