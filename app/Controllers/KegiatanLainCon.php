<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class KegiatanLainCon extends BaseController
{
  protected $kegiatanModel;

  public function __construct()
  {
    $this->kegiatanModel = new KegiatanModel();
  }

  public function index()
  {
    $halaman = $this->request->getVar('page_kegiatanlain') ? $this->request->getVar('page_kegiatanlain') : 1;
    $data = [
      'tittle' => 'Kegiatan lain-lain',
      'PagesAdmin' => 'pendataan',
      'kegiatanlain' => $this->kegiatanModel->paginate(3, 'kegiatanlain'),
      'pager' => $this->kegiatanModel->pager,
      'halaman' => $halaman
    ];
    return view('laporan/admin/kegiatanlain/index', $data);
  }

  public function detail($kdKegiatan)
  {
    $data = [
      'tittle' => 'Kegiatan lain-lain',
      'PagesAdmin' => 'pendataan',
      'kegiatanlain' => $this->kegiatanModel->getKegiatan($kdKegiatan)
    ];

    return view('laporan/admin/kegiatanlain/detail', $data);
  }

  public function create()
  {
    session();
    $data = [
      'tittle' => 'Kegiatan lain-lain',
      'PagesAdmin' => 'pendataan',
      'validation' => \Config\Services::validation()
    ];
    return view('laporan/admin/kegiatanlain/create', $data);
  }

  public function save()
  {
    $btn = $this->request->getVar('aksi');
    if ($btn == "tambah") {
      //validation input
      if (!$this->validate([
        'nama_kegiatan' => [
          'rules' => 'required[kegiatanlain.nama_kegiatan]',
          'errors' => [
            'required' => '{field} PKK harus diisi'
          ]
        ],
        'tempat_pelaksanaan' => [
          'rules' => 'required[kegiatanlain.tempat_pelaksanaan]',
          'errors' => [
            'required' => 'Tempat pelaksanaan harus diisi'
          ]
        ],
        'tgl_pelaksanaan' => [
          'rules' => 'required[kegiatanlain.tgl_pelaksanaan]',
          'errors' => [
            'required' => 'Tanggal pelaksanaan harus diisi'
          ]
        ],
        'foto' => [
          'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
          'errors' => [
            'max_size' => 'Ukuran gambar terlalu besar.',
            'is_image' => 'Yang anda pilih bukan gambar.',
            'mime_in' => 'Yang anda pilih bukan gambar'
          ]
        ],
        'video' => [
          'rules' => 'max_size[video,15024]|mime_in[video,video/mp4,video/3gp,video/avi]',
          'errors' => [
            'max_size' => 'Ukuran video terlalu besar.',
            'mime_in' => 'Yang anda pilih bukan video'
          ]
        ]
      ])) {
        return redirect()->to('/kegiatanlain/create')->withInput();
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
      //ambil file
      $fileVideo = $this->request->getFile('video');
      //apakah tidak ada file yang diupload
      if ($fileVideo->getError() == 4) {
        $namaVideo = '';
      } else {
        //generate nama sampul random
        $namaVideo = $fileVideo->getRandomName();
        //pindahkan file ke folder img
        $fileVideo->move('img', $namaVideo);
      }
      $data = [
        'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
        'tempat_pelaksanaan' => $this->request->getVar('tempat_pelaksanaan'),
        'tgl_pelaksanaan' => $this->request->getVar('tgl_pelaksanaan'),
        'foto' => $namaFoto,
        'video' => $namaVideo,
        'keterangan' => $this->request->getVar('keterangan')
      ];
      $this->kegiatanModel->save($data);
      session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
      return redirect()->to('/kegiatanlain/index');
    } elseif ($btn == "batal") {
      return redirect()->to('/kegiatanlain/index');
    }
  }

  public function delete($kdKegiatan)
  {
    //cari gambar berdarakan id
    $kegiatan = $this->kegiatanModel->getKegiatan($kdKegiatan);
    //cek jika file tidak ada
    if ($kegiatan['foto'] != '' && $kegiatan['video'] != '') {
      //hapus gambar
      unlink('img/' . $kegiatan['foto']);
      unlink('img/' . $kegiatan['video']);
    }
    $this->kegiatanModel->where('kd_kegiatan', $kdKegiatan)->delete();
    session()->setFlashdata('hapus', 'Data berhasil dihapus.');
    return redirect()->to('/kegiatanlain/index');
  }

  public function edit($kdKegiatan)
  {
    $data = [
      'tittle' => 'Kegiatan lain-lain',
      'PagesAdmin' => 'pendataan',
      'validation' => \Config\Services::validation(),
      'kegiatanlain' => $this->kegiatanModel->getKegiatan($kdKegiatan)
    ];
    return view('laporan/admin/kegiatanlain/edit', $data);
  }

  public function update($kdKegiatan)
  {
    $btn = $this->request->getVar('aksi');
    if ($btn == "tambah") {
      if (!$this->validate([
        'nama_kegiatan' => [
          'rules' => 'required[kegiatanlain.nama_kegiatan]',
          'errors' => [
            'required' => 'Nama kegiatan harus diisi'
          ]
        ],
        'tempat_pelaksanaan' => [
          'rules' => 'required[kegiatanlain.tempat_pelaksanaan]',
          'errors' => [
            'required' => 'Tempat pelaksanaan harus diisi'
          ]
        ],
        'tgl_pelaksanaan' => [
          'rules' => 'required[kegiatanlain.tgl_pelaksanaan]',
          'errors' => [
            'required' => 'Tanggal pelaksanaan harus diisi'
          ]
        ],
        'foto' => [
          'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
          'errors' => [
            'max_size' => 'Ukuran gambar terlalu besar.',
            'is_image' => 'Yang anda pilih bukan gambar.',
            'mime_in' => 'Yang anda pilih bukan gambar'
          ]
        ],
        'video' => [
          'rules' => 'max_size[video,15024]|is_image[video]|mime_in[video,video/3gp,video/mp4,video/mvk]',
          'errors' => [
            'max_size' => 'Ukuran video terlalu besar.',
            'is_image' => 'Yang anda pilih bukan video.',
            'mime_in' => 'Yang anda pilih bukan video'
          ]
        ]
      ])) {
        return redirect()->to("/kegiatanlain/edit/$kdKegiatan")->withInput();
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

      $fileVideo = $this->request->getFile('video');
      $namaVideo = $this->request->getVar('videoLama');
      if ($fileVideo->getError() == 4) {
        $namaVideo = $this->request->getVar('videoLama');
      } elseif ($namaVideo == "") {
        $namaVideo = $fileVideo->getRandomName();
        $fileVideo->move('img', $namaVideo);
      } else {
        $namaVideo = $fileVideo->getRandomName();
        $fileVideo->move('img', $namaVideo);
        unlink('img/' . $this->request->getVar('videoLama'));
      }
      $data = [
        'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
        'tempat_pelaksanaan' => $this->request->getVar('tempat_pelaksanaan'),
        'tgl_pelaksanaan' => $this->request->getVar('tgl_pelaksanaan'),
        'foto' => $namaFoto,
        'video' => $namaVideo,
        'keterangan' => $this->request->getVar('keterangan')
      ];
      $this->kegiatanModel->where('kd_kegiatan', $kdKegiatan)->set($data)->update();
      session()->setFlashdata('pesan', 'Data berhasil diubah.');
      return redirect()->to('/kegiatanlain/index');
    } elseif ($btn == "batal") {
      return redirect()->to("/kegiatanlain/detail/$kdKegiatan");
    }
  }

  public function range()
  {
    $data = [
      'tittle' => 'Monitoring & Laporan',
      'PagesAdmin' => 'laporan',
      'kegiatanlain' => $this->kegiatanModel->getTanggal(),
      'validation' => \Config\Services::validation()
    ];
    return view('laporan/admin/kegiatanlain/range', $data);
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
        'PagesAdmin' => 'laporan',
        'kegiatanlain' => $this->kegiatanModel->getRange($awal, $akhir),
        'tahun1' => $tahun1,
        'tahun2' => $tahun2,
        'awal' => $awal,
        'akhir' => $akhir
      ];
      return view('laporan/admin/kegiatanlain/lihatrange', $data);
    } elseif ($btn == "batal") {
      return redirect()->to('/admin/laporan');
    }
  }

  public function print()
  {
    $awal = $this->request->getVar('awal');
    $akhir = $this->request->getVar('akhir');
    $tahun1 = substr($awal, 0, 4);
    $tahun2 = substr($akhir, 0, 4);
    $btn = $this->request->getVar('aksi');
    if ($btn == "print") {
      $data = [
        'kegiatanlain' => $this->kegiatanModel->getRange($awal, $akhir),
        'tahun1' => $tahun1,
        'tahun2' => $tahun2,
        'awal' => $awal,
        'akhir' => $akhir
      ];
      return view('laporan/admin/kegiatanlain/print', $data);
    } elseif ($btn == "batal") {
      return redirect()->to('/kegiatanlain/range');
    }
  }
}
