<?php

namespace App\Controllers;

use App\Models\BukuinvenModel;

class BukuinvenCon extends BaseController
{
    protected $bukuinvenModel;

    public function __construct()
    {
        $this->bukuinvenModel = new BukuinvenModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_bukuinventaris') ? $this->request->getVar('page_bukuinventaris') : 1;
        $data = [
            'tittle' => 'Buku Inventaris',
            'PagesAdmin' => 'pendataan',
            'bukuinven' => $this->bukuinvenModel->paginate(4, 'bukuinventaris'),
            'pager' => $this->bukuinvenModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/bukuinventaris/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Buku Inventaris',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/bukuinventaris/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_brg' => [
                    'rules' => 'required[bukuinventaris.nama_brg]',
                    'errors' => [
                        'required' => 'Nama barang harus diisi'
                    ]
                ],
                'asal_brg' => [
                    'rules' => 'required[bukukegiatan.asal_brg]',
                    'errors' => [
                        'required' => 'Asal barang harus diisi'
                    ]
                ],
                'tgl_terima_beli' => [
                    'rules' => 'required[bukukegiatan.tgl_terima_beli]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required[bukukegiatan.jumlah]',
                    'errors' => [
                        'required' => 'Jumlah harus diisi'
                    ]
                ],
                'tempat_simpan' => [
                    'rules' => 'required[bukukegiatan.tempat_simpan]',
                    'errors' => [
                        'required' => 'Tempat penyimpanan harus diisi'
                    ]
                ],
                'kondisi_brg' => [
                    'rules' => 'required[bukukegiatan.kondisi_brg]',
                    'errors' => [
                        'required' => 'Kondisi barang harus diisi'
                    ]
                ],
                'foto' => [
                    'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar.',
                        'is_image' => 'Yang anda pilih bukan gambar.',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to('/bukuinventaris/create')->withInput();
            }
            //ambil gambar
            $fileFoto = $this->request->getFile('foto');
            //apakah tidak ada gambar yang diupload
            if ($fileFoto->getError() == 4) {
                $namaFoto = '';
            } else {
                //generate nama sampul random
                $namaFoto = $fileFoto->getRandomName();
                //pindahkan file ke folder img
                $fileFoto->move('img', $namaFoto);
            }

            $data = [
                'nama_brg' => $this->request->getVar('nama_brg'),
                'asal_brg' => $this->request->getVar('asal_brg'),
                'tgl_terima_beli' => $this->request->getVar('tgl_terima_beli'),
                'jumlah' => $this->request->getVar('jumlah'),
                'tempat_simpan' => $this->request->getVar('tempat_simpan'),
                'kondisi_brg' => $this->request->getVar('kondisi_brg'),
                'foto' => $namaFoto,
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->bukuinvenModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/bukuinventaris/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/bukuinventaris/index');
        }
    }

    public function delete($num)
    {
        //cari gambar berdarakan id
        $inventaris = $this->bukuinvenModel->getBukuinven($num);
        //cek jika fila gambar defaultpkk.png
        if ($inventaris['foto'] != 'defaultpkk.png') {
            //hapus gambar
            unlink('img/' . $inventaris['foto']);
        }
        $this->bukuinvenModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Barang $inventaris[nama_brg] dengan jumlah $inventaris[jumlah] berhasil dihapus.");
        return redirect()->to('/bukuinventaris/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Buku Inventaris',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'bukuinven' => $this->bukuinvenModel->getBukuinven($num)
        ];
        return view('laporan/admin/bukuinventaris/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_brg' => [
                    'rules' => 'required[bukuinventaris.nama_brg]',
                    'errors' => [
                        'required' => 'Nama barang harus diisi'
                    ]
                ],
                'asal_brg' => [
                    'rules' => 'required[bukukegiatan.asal_brg]',
                    'errors' => [
                        'required' => 'Asal barang harus diisi'
                    ]
                ],
                'tgl_terima_beli' => [
                    'rules' => 'required[bukukegiatan.tgl_terima_beli]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required[bukukegiatan.jumlah]',
                    'errors' => [
                        'required' => 'Jumlah harus diisi'
                    ]
                ],
                'tempat_simpan' => [
                    'rules' => 'required[bukukegiatan.tempat_simpan]',
                    'errors' => [
                        'required' => 'Tempat penyimpanan harus diisi'
                    ]
                ],
                'kondisi_brg' => [
                    'rules' => 'required[bukukegiatan.kondisi_brg]',
                    'errors' => [
                        'required' => 'Kondisi barang harus diisi'
                    ]
                ],
                'foto' => [
                    'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar.',
                        'is_image' => 'Yang anda pilih bukan gambar.',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to("/bukuinventaris/edit/$num")->withInput();
            }
            $fileFoto = $this->request->getFile('foto');
            if ($fileFoto != null) {
                $namaFoto = $this->request->getVar('fotoLama');
                //cek gambar, apakah tetap gambar lama
                if ($fileFoto->getError() == 4) {
                    $namaFoto = $this->request->getVar('fotoLama');
                } else {
                    //generate nama file random
                    $namaFoto = $fileFoto->getRandomName();
                    //pindahkan gambar
                    $fileFoto->move('img', $namaFoto);
                    //hapus file yang lama
                    if ($this->request->getVar('fotoLama') != '') {
                        unlink('img/' . $this->request->getVar('fotoLama'));
                    }
                }
            } elseif ($fileFoto == null) {
                $namaFoto = "";
            }
            $data = [
                'nama_brg' => $this->request->getVar('nama_brg'),
                'asal_brg' => $this->request->getVar('asal_brg'),
                'tgl_terima_beli' => $this->request->getVar('tgl_terima_beli'),
                'jumlah' => $this->request->getVar('jumlah'),
                'tempat_simpan' => $this->request->getVar('tempat_simpan'),
                'kondisi_brg' => $this->request->getVar('kondisi_brg'),
                'foto' => $namaFoto,
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->bukuinvenModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/bukuinventaris/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/bukuinventaris/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'bukuinven' => $this->bukuinvenModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/bukuinventaris/range', $data);
    }

    public function lihatRange()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'bukuinven' => $this->bukuinvenModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/bukuinventaris/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/admin/laporan');
        }
    }

    public function print()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'bukuinven' => $this->bukuinvenModel->getRange($awal, $akhir)
            ];
            return view('laporan/admin/bukuinventaris/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/bukuinventaris/range');
        }
    }
}
