<?php

namespace App\Controllers;

use App\Models\DaftartimpkkModel;

class DaftartimpkkCon extends BaseController
{
    protected $daftartimpkkModel;

    public function __construct()
    {
        $this->daftartimpkkModel = new DaftartimpkkModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Daftar Tim PKK',
            'PagesAdmin' => 'pendataan',
            'wilayah' => $this->daftartimpkkModel->getWilayah()
        ];
        return view('laporan/admin/daftartimpkk/index', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Daftar Tim PKK',
            'PagesAdmin' => 'pendataan',
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'daftartimpkk' => $this->daftartimpkkModel->getDaftartimpkk($kdwilayah)
        ];
        //jika tabel kosong
        if (empty($data['daftartimpkk'])) {
            $data = [
                'tittle' => 'Daftar Tim PKK',
                'PagesAdmin' => 'pendataan',
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'daftartimpkk' => $this->daftartimpkkModel->getDaftartimpkk($kdwilayah)
            ];
            return view('laporan/admin/daftartimpkk/detail', $data);
        }
        return view('laporan/admin/daftartimpkk/detail', $data);
    }

    public function create($kdwilayah)
    {
        session();
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Daftar Tim PKK',
            'PagesAdmin' => 'pendataan',
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/daftartimpkk/create', $data);
    }

    public function save($kdwilayah)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required[daftartimpkk.nama]',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'tgl_masuk' => [
                    'rules' => 'required[daftartimpkk.tgl_masuk]',
                    'errors' => [
                        'required' => 'Tanggal masuk harus diisi!'
                    ]
                ],
                'jabatan' => [
                    'rules' => 'required[daftartimpkk.jabatan]',
                    'errors' => [
                        'required' => 'Jabatan harus diisi!'
                    ]
                ],
                'jk' => [
                    'rules' => 'required[daftartimpkk.jk]',
                    'errors' => [
                        'required' => 'Jenis kelamin harus diisi!'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required[daftartimpkk.tempat_lahir]',
                    'errors' => [
                        'required' => 'Tempat lahir harus diisi!'
                    ]
                ],
                'tgl_lahir' => [
                    'rules' => 'required[daftartimpkk.tgl_lahir]',
                    'errors' => [
                        'required' => 'Tanggal lahir harus diisi!'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required[daftartimpkk.alamat]',
                    'errors' => [
                        'required' => 'Alamat harus diisi!'
                    ]
                ],
                'pendidikan' => [
                    'rules' => 'required[daftartimpkk.pendidikan]',
                    'errors' => [
                        'required' => 'Pendidikan harus diisi!'
                    ]
                ],
                'pekerjaan' => [
                    'rules' => 'required[daftartimpkk.pekerjaan]',
                    'errors' => [
                        'required' => 'Pekerjaan harus diisi!'
                    ]
                ],
                'status' => [
                    'rules' => 'required[daftartimpkk.status]',
                    'errors' => [
                        'required' => 'Status harus diisi!'
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
                return redirect()->to("/daftartimpkk/create/$kdwilayah")->withInput();
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
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'tgl_masuk' => $this->request->getVar('tgl_masuk'),
                'nama' => $this->request->getVar('nama'),
                'jabatan' => $this->request->getVar('jabatan'),
                'jk' => $this->request->getVar('jk'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'status' => $this->request->getVar('status'),
                'alamat' => $this->request->getVar('alamat'),
                'pendidikan' => $this->request->getVar('pendidikan'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
                'foto' => $namaFoto,
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->daftartimpkkModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/DaftartimpkkCon/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/DaftartimpkkCon/detail/$kdwilayah");
        }
    }

    public function delete($num)
    {
        $daftar = $this->daftartimpkkModel->getUbah($num);
        $kdWilayah = $daftar['kd_wilayah'];
        $this->daftartimpkkModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to("/daftartimpkk/detail/$kdWilayah");
    }

    public function edit($no)
    {
        $daftartimpkk =  $this->daftartimpkkModel->getUbah($no);
        $kdwilayah = $daftartimpkk['kd_wilayah'];
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Daftar Tim PKK',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'daftartimpkk' => $daftartimpkk,
            'kelurahan' => $wilayah['kelurahan']
        ];
        return view('laporan/admin/daftartimpkk/edit', $data);
    }

    public function update($num)
    {
        $kdWilayah = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required[daftartimpkk.nama]',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'tgl_masuk' => [
                    'rules' => 'required[daftartimpkk.tgl_masuk]',
                    'errors' => [
                        'required' => 'Tanggal masuk harus diisi!'
                    ]
                ],
                'jabatan' => [
                    'rules' => 'required[daftartimpkk.jabatan]',
                    'errors' => [
                        'required' => 'Jabatan harus diisi!'
                    ]
                ],
                'jk' => [
                    'rules' => 'required[daftartimpkk.jk]',
                    'errors' => [
                        'required' => 'Jenis kelamin harus diisi!'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required[daftartimpkk.tempat_lahir]',
                    'errors' => [
                        'required' => 'Tempat lahir harus diisi!'
                    ]
                ],
                'tgl_lahir' => [
                    'rules' => 'required[daftartimpkk.tgl_lahir]',
                    'errors' => [
                        'required' => 'Tanggal lahir harus diisi!'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required[daftartimpkk.alamat]',
                    'errors' => [
                        'required' => 'Alamat harus diisi!'
                    ]
                ],
                'pendidikan' => [
                    'rules' => 'required[daftartimpkk.pendidikan]',
                    'errors' => [
                        'required' => 'Pendidikan harus diisi!'
                    ]
                ],
                'pekerjaan' => [
                    'rules' => 'required[daftartimpkk.pekerjaan]',
                    'errors' => [
                        'required' => 'Pekerjaan harus diisi!'
                    ]
                ],
                'status' => [
                    'rules' => 'required[daftartimpkk.status]',
                    'errors' => [
                        'required' => 'Status harus diisi!'
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
                return redirect()->to("/daftartimpkk/edit/$num")->withInput();
            }
            $fileFoto = $this->request->getFile('foto');
            $namaFoto = $this->request->getVar('fotoLama');
            //cek gambar, apakah tetap gambar lama
            if ($fileFoto->getError() == 4) {
                $namaFoto = $this->request->getVar('fotoLama');
            } elseif ($namaFoto == '') {
                //generate nama file random
                $namaFoto = $fileFoto->getRandomName();
                //pindahkan gambar
                $fileFoto->move('img', $namaFoto);
            } else {
                //generate nama file random
                $namaFoto = $fileFoto->getRandomName();
                //pindahkan gambar
                $fileFoto->move('img', $namaFoto);
                //hapus file yang lama
                unlink('img/' . $this->request->getVar('fotoLama'));
            }

            $data = [
                'kd_wilayah' => $kdWilayah,
                'tgl_masuk' => $this->request->getVar('tgl_masuk'),
                'nama' => $this->request->getVar('nama'),
                'jabatan' => $this->request->getVar('jabatan'),
                'jk' => $this->request->getVar('jk'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'status' => $this->request->getVar('status'),
                'alamat' => $this->request->getVar('alamat'),
                'pendidikan' => $this->request->getVar('pendidikan'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
                'foto' => $namaFoto,
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->daftartimpkkModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/daftartimpkk/detail/$kdWilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/daftartimpkk/detail/$kdWilayah");
        }
    }

    public function wilayahRange()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'wilayah' => $this->daftartimpkkModel->getWilayah()
        ];
        return view('laporan/admin/daftartimpkk/wilayahrange', $data);
    }

    public function range($kdwilayah)
    {
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'daftartimpkk' => $this->daftartimpkkModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/daftartimpkk/range', $data);
    }

    public function lihatRange($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'daftartimpkk' => $this->daftartimpkkModel->getRange($kdwilayah, $awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/daftartimpkk/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/daftartimpkk/wilayahrange');
        }
    }

    public function print($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        if ($btn == "print") {
            $data = [
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'daftartimpkk' => $this->daftartimpkkModel->getRange($kdwilayah, $awal, $akhir)
            ];
            return view('laporan/admin/daftartimpkk/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/daftartimpkk/range/$kdwilayah");
        }
    }
}
