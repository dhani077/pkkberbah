<?php

namespace App\Controllers;

use App\Models\BukukegiatanModel;

class BukukegiatanCon extends BaseController
{
    protected $bukukegiatanModel;

    public function __construct()
    {
        $this->bukukegiatanModel = new BukukegiatanModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_bukukegiatan') ? $this->request->getVar('page_bukukegiatan') : 1;
        $data = [
            'tittle' => 'Buku Kegiatan',
            'PagesAdmin' => 'pendataan',
            'bukukegiatan' => $this->bukukegiatanModel->paginate(4, 'bukukegiatan'),
            'pager' => $this->bukukegiatanModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/bukukegiatan/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Buku Kegiatan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/bukukegiatan/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required[bukukegiatan.nama]',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'jabatan' => [
                    'rules' => 'required[bukukegiatan.jabatan]',
                    'errors' => [
                        'required' => 'Jabatan harus diisi'
                    ]
                ],
                'tgl_kegiatan' => [
                    'rules' => 'required[bukukegiatan.tgl_kegiatan]',
                    'errors' => [
                        'required' => 'Tanggal kegiatan harus diisi'
                    ]
                ],
                'tempat_kegiatan' => [
                    'rules' => 'required[bukukegiatan.tempat_kegiatan]',
                    'errors' => [
                        'required' => 'Tempat kegiatan harus diisi'
                    ]
                ],
                'uraian_kegiatan' => [
                    'rules' => 'required[bukukegiatan.uraian_kegiatan]',
                    'errors' => [
                        'required' => 'Uraian kegiatan harus diisi'
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
                return redirect()->to('/bukukegiatan/create')->withInput();
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
                'nama' => $this->request->getVar('nama'),
                'jabatan' => $this->request->getVar('jabatan'),
                'tgl_kegiatan' => $this->request->getVar('tgl_kegiatan'),
                'tempat_kegiatan' => $this->request->getVar('tempat_kegiatan'),
                'foto' => $namaFoto,
                'uraian_kegiatan' => $this->request->getVar('uraian_kegiatan')
            ];
            $this->bukukegiatanModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/bukukegiatan/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/bukukegiatan/index');
        }
    }

    public function delete($num)
    {
        $this->bukukegiatanModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to('/bukukegiatan/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Buku Kegiatan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'bukukegiatan' => $this->bukukegiatanModel->getBukukegiatan($num)
        ];
        return view('laporan/admin/bukukegiatan/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required[bukukegiatan.nama]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'jabatan' => [
                    'rules' => 'required[bukukegiatan.jabatan]',
                    'errors' => [
                        'required' => 'Jabatan harus diisi'
                    ]
                ],
                'tgl_kegiatan' => [
                    'rules' => 'required[bukukegiatan.tgl_kegiatan]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'tempat_kegiatan' => [
                    'rules' => 'required[bukukegiatan.tempat_kegiatan]',
                    'errors' => [
                        'required' => 'Tempat kegiatan harus diisi'
                    ]
                ],
                'uraian_kegiatan' => [
                    'rules' => 'required[bukukegiatan.uraian_kegiatan]',
                    'errors' => [
                        'required' => 'Uraian harus diisi'
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
                return redirect()->to("/bukukegiatan/edit/$num")->withInput();
            }
            $fileFoto = $this->request->getFile('foto');
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

            $data = [
                'nama' => $this->request->getVar('nama'),
                'jabatan' => $this->request->getVar('jabatan'),
                'tgl_kegiatan' => $this->request->getVar('tgl_kegiatan'),
                'tempat_kegiatan' => $this->request->getVar('tempat_kegiatan'),
                'foto' => $namaFoto,
                'uraian_kegiatan' => $this->request->getVar('uraian_kegiatan')
            ];
            $this->bukukegiatanModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/bukukegiatan/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/bukukegiatan/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'dokumen',
            'bukukegiatan' => $this->bukukegiatanModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/bukukegiatan/range', $data);
    }

    public function lihatRange()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'dokumen',
                'awal' => $awal,
                'akhir' => $akhir,
                'bukukegiatan' => $this->bukukegiatanModel->getRange($awal, $akhir),
                'validation' => \Config\Services::validation()
            ];

            return view('laporan/admin/bukukegiatan/lihatrange', $data);
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
                'tittle' => 'Print Dokumen',
                'bukukegiatan' => $this->bukukegiatanModel->getRange($awal, $akhir)
            ];
            return view('laporan/admin/bukukegiatan/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/bukukegiatan/range');
        }
    }
}
