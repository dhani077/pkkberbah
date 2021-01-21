<?php

namespace App\Controllers;

use App\Models\DaftaranggotatppkkkaderModel;
use App\Models\DatapelatihankaderModel;

class DaftaranggotatppkkkaderCon extends BaseController
{
    protected $daftaranggotatppkkkaderModel;
    protected $datapelatihankaderModel;

    public function __construct()
    {
        $this->daftaranggotatppkkkaderModel = new DaftaranggotatppkkkaderModel();
        $this->datapelatihankaderModel = new DatapelatihankaderModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Anggota TP PKK Dan Kader',
            'PagesAdmin' => 'pendataan',
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->getWilayah()
        ];
        return view('laporan/admin/daftaranggotatppkkkader/index', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Anggota TP PKK Dan Kader',
            'PagesAdmin' => 'pendataan',
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->getDaftaranggota($kdwilayah),
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('laporan/admin/daftaranggotatppkkkader/detail', $data);
    }

    public function create($kdwilayah)
    {
        session();
        $data = [
            'tittle' => 'Anggota TP PKK Dan Kader',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'wilayah' => $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah)
        ];
        return view('laporan/admin/daftaranggotatppkkkader/create', $data);
    }

    public function save()
    {
        $kd = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'no_reg' => [
                    'rules' => 'required[daftaranggotakadertppkk.no_reg]',
                    'errors' => [
                        'required' => 'Nomor registrasi harus diisi'
                    ]
                ],
                'tgl_masuk' => [
                    'rules' => 'required[daftaranggotakadertppkk.tgl_masuk]',
                    'errors' => [
                        'required' => 'Tanggal Masuk harus diisi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required[daftaranggotakadertppkk.nama]',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'jk' => [
                    'rules' => 'required[daftaranggotakadertppkk.jk]',
                    'errors' => [
                        'required' => 'Jenis kelamin harus diisi!'
                    ]
                ],
                'tgl_lahir' => [
                    'rules' => 'required[daftaranggotakadertppkk.tgl_lahir]',
                    'errors' => [
                        'required' => 'Tanggal lahir harus diisi'
                    ]
                ],
                'status' => [
                    'rules' => 'required[daftaranggotakadertppkk.status]',
                    'errors' => [
                        'required' => 'Status harus diisi'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required[daftaranggotakadertppkk.alamat]',
                    'errors' => [
                        'required' => 'Alamat harus diisi'
                    ]
                ],
                'pendidikan' => [
                    'rules' => 'required[daftaranggotakadertppkk.pendidikan]',
                    'errors' => [
                        'required' => 'Pendidikan harus diisi'
                    ]
                ],
                'pekerjaan' => [
                    'rules' => 'required[daftaranggotakadertppkk.pekerjaan]',
                    'errors' => [
                        'required' => 'Pekerjaan harus diisi'
                    ]
                ],
                'foto' => [
                    'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar.',
                        'is_image' => 'Yang anda pilih bukan gambar.',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to("/daftaranggotatppkkkader/create/$kd")->withInput();
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
            $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kd);
            $data = [
                'kd_wilayah' => $kd,
                'no_reg' => $this->request->getVar('no_reg'),
                'tgl_masuk' => $this->request->getVar('tgl_masuk'),
                'nama' => $this->request->getVar('nama'),
                'jk' => $this->request->getVar('jk'),
                'fungsi_anggota' => $this->request->getVar('fungsi_anggota'),
                'fungsi_kader_umum' => $this->request->getVar('fungsi_kader_umum'),
                'fungsi_kader_khusus' => $this->request->getVar('fungsi_kader_khusus'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'status' => $this->request->getVar('status'),
                'alamat' => $this->request->getVar('alamat'),
                'pendidikan' => $this->request->getVar('pendidikan'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
                'foto' => $namaFoto,
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->daftaranggotatppkkkaderModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada desa/kelurahan $wilayah[kelurahan] .");
            return redirect()->to("/daftaranggotatppkkkader/detail/$kd");
        } elseif ($btn == "batal") {
            return redirect()->to("/daftaranggotatppkkkader/detail/$kd");
        }
    }

    public function delete($noreg)
    {
        $pelatihan = $this->datapelatihankaderModel->getCek($noreg);
        $daftaranggota = $this->daftaranggotatppkkkaderModel->getEditdaftar($noreg);
        $kdwilayah = $daftaranggota['kd_wilayah'];
        if ($pelatihan != null) {
            session()->setFlashdata('gagal', "Data nama kader $daftaranggota[nama] gagal dihapus dikarenakan masih ada data pelatihan yang pernah diikuti. Silahkan Cek!");
            return redirect()->to("/daftaranggotatppkkkader/detail/$kdwilayah");
        } elseif (empty($pelatihan)) {
            $this->daftaranggotatppkkkaderModel->where('no_reg', $noreg)->delete();
            session()->setFlashdata('hapus', "Data nama kader $daftaranggota[nama] berhasil dihapus.");
            return redirect()->to("/daftaranggotatppkkkader/detail/$kdwilayah");
        }
    }

    public function edit($noreg)
    {
        $anggota = $this->daftaranggotatppkkkaderModel->getData($noreg);
        $kdwilayah = $anggota['kd_wilayah'];
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Anggota TP PKK Dan Kader',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->getEditdaftar($noreg),
            'wilayah' => $wilayah
        ];
        return view('laporan/admin/daftaranggotatppkkkader/edit', $data);
    }

    public function update()
    {
        $noregLama = $this->request->getVar('no_regLama');
        $kd = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'no_reg' => [
                    'rules' => 'required[daftaranggotakadertppkk.no_reg]',
                    'errors' => [
                        'required' => 'Nomor registrasi harus diisi'
                    ]
                ],
                'tgl_masuk' => [
                    'rules' => 'required[daftaranggotakadertppkk.tgl_masuk]',
                    'errors' => [
                        'required' => 'Tanggal Masuk harus diisi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required[daftaranggotakadertppkk.nama]',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'jk' => [
                    'rules' => 'required[daftaranggotakadertppkk.jk]',
                    'errors' => [
                        'required' => 'Jenis kelamin harus diisi!'
                    ]
                ],
                'tgl_lahir' => [
                    'rules' => 'required[daftaranggotakadertppkk.tgl_lahir]',
                    'errors' => [
                        'required' => 'Tanggal lahir harus diisi'
                    ]
                ],
                'status' => [
                    'rules' => 'required[daftaranggotakadertppkk.status]',
                    'errors' => [
                        'required' => 'Status harus diisi'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required[daftaranggotakadertppkk.alamat]',
                    'errors' => [
                        'required' => 'Alamat harus diisi'
                    ]
                ],
                'pendidikan' => [
                    'rules' => 'required[daftaranggotakadertppkk.pendidikan]',
                    'errors' => [
                        'required' => 'Pendidikan harus diisi'
                    ]
                ],
                'pekerjaan' => [
                    'rules' => 'required[daftaranggotakadertppkk.pekerjaan]',
                    'errors' => [
                        'required' => 'Pekerjaan harus diisi'
                    ]
                ],
                'foto' => [
                    'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar.',
                        'is_image' => 'Yang anda pilih bukan gambar.',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to("/daftaranggotatppkkkader/edit/$noregLama")->withInput();
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
            $noreg = $this->request->getVar('no_reg');
            $data = [
                'no_reg' => $noreg,
                'kd_wilayah' => $kd,
                'tgl_masuk' => $this->request->getVar('tgl_masuk'),
                'nama' => $this->request->getVar('nama'),
                'jk' => $this->request->getVar('jk'),
                'fungsi_anggota' => $this->request->getVar('fungsi_anggota'),
                'fungsi_kader_umum' => $this->request->getVar('fungsi_kader_umum'),
                'fungsi_kader_khusus' => $this->request->getVar('fungsi_kader_khusus'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'status' => $this->request->getVar('status'),
                'alamat' => $this->request->getVar('alamat'),
                'pendidikan' => $this->request->getVar('pendidikan'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
                'foto' => $namaFoto,
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->daftaranggotatppkkkaderModel->where('no_reg', $noreg)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/daftaranggotatppkkkader/detail/$kd");
        } elseif ($btn == "batal") {
            return redirect()->to("/daftaranggotatppkkkader/detail/$kd");
        }
    }

    public function wilayahRange()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->getWilayah()
        ];
        return view('laporan/admin/daftaranggotatppkkkader/wilayahrange', $data);
    }

    public function range($kdwilayah)
    {
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/daftaranggotatppkkkader/range', $data);
    }

    public function lihatRange($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
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
                'daftaranggota' => $this->daftaranggotatppkkkaderModel->getRange($kdwilayah, $awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/daftaranggotatppkkkader/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/daftaranggotatppkkkader/wilayahrange');
        }
    }

    public function print($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'daftaranggota' => $this->daftaranggotatppkkkaderModel->getRange($kdwilayah, $awal, $akhir),
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/daftaranggotatppkkkader/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/daftaranggotatppkkkader/range/$kdwilayah");
        }
    }
}
