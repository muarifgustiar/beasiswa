<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> 
                        <h3>Data Siswa</h3>
                    </div>
                    <div class="widget-content">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pribadi</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Nama Lengkap :</dt>
                                        <dd><?php echo $data[0]['nama_lengkap'] ?></dd>

                                        <dt>Jenis Kelamin :</dt>
                                        <dd><?php echo ($data[0]['nama_lengkap']=='L'?'Laki-laki' : 'Perempuan') ?></dd>
                                        
                                        <dt>Tempat / Tanggal Lahir :</dt>
                                        <dd><?php echo $data[0]['tempat_lahir'] ?> / <?php 

                                        $month = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
                                        echo date('j',strtotime($data[0]['tanggal_lahir'])) . ' ' .$month[date('n',strtotime($data[0]['tanggal_lahir']))]. ' ' .date('Y',strtotime($data[0]['tanggal_lahir']));

                                        ?></dd>

                                        <dt>Alamat Rumah :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_rumah']?>,<br> 
                                                        Kel. <?php echo $data[0]['kelurahan']?>, Kec. <?php echo $data[0]['kecamatan']?>,<br>
                                                        <?php echo $data[0]['kota']?>, <?php echo $data[0]['nama_provinsi']?>, <?php echo $data[0]['kode_pos']?>,<br>
                                            </address>
                                        </dd>

                                        <dt>Kanwil :</dt>
                                        <dd><?php echo $data[0]['nama_kanwil']?></dd>

                                        <dt>No Telp / HP :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon']?></dd>

                                        <dt>Email :</dt>
                                        <dd><i class="icon icon-envelope"></i><?php echo $data[0]['email']?></dd>
                                        
                                        <dt>Jenis Rekening :</dt>
                                        <dd><?php echo $data[0]['jenis_rek']?></dd>  

                                        <dt>Nomor Rekening :</dt>
                                        <dd><?php echo $data[0]['no_rek']?></dd>

                                        <dt>Atas Nama :</dt>
                                        <dd><?php echo $data[0]['rek_nama']?></dd>
                                    </dl>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pendidikan</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Nama Sekolah :</dt>
                                        <dd><?php echo $data[0]['nama_sekolah'] ?></dd>

                                        <dt>Kelas / Tingkatan :</dt>
                                        <dd><?php echo $data[0]['labelk'].' '.$data[0]['labelt'];?></dd>
                                        
                                        <dt>Alamat Sekolah :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_sekolah']?>
                                              </address>
                                        </dd>

                                        <dt>No Telp / HP :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon_sekolah']?></dd>

                                        <dt>Nama Sekolah:</dt>
                                        <dd><?php echo $data[0]['nama_sekolah']?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Orang Tua Siswa</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Nama Lengkap :</dt>
                                        <dd><?php echo $data[0]['nama_ortu'] ?></dd>

                                        <dt>Pekerjaan Orang Tua :</dt>
                                        <dd><?php echo $data[0]['pekerjaan_ortu'] ?></dd>

                                        <dt>Status Pekerjaan :</dt>
                                        <dd><?php 

                                            $st = array('Tetap','Kontrak / Outsourcing', 'Training');
                                            echo $st[$data[0]['status_pekerjaan']-1];

                                            ?></dd>
                                        
                                        <dt>Lama Pekerjaan :</dt>
                                        <dd><?php echo $data[0]['lama_pekerjaan'] ?></dd>

                                        <dt>Alamat Sekolah :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_ortu']?>
                                              </address>
                                        </dd>

                                        <dt>HP / Telepon Rumah :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon_ortu']?></dd>

                                        <dt>Rata-rata Penghasilan/Bulan :</dt>
                                        <dd><?php echo $data[0]['pendapatan']?></dd>

                                        <dt>Rata-rata Pengeluaran/Bulan :</dt>
                                        <dd><?php echo $data[0]['pengeluaran']?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Perekomendasi</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Nama Lengkap :</dt>
                                        <dd><?php echo $data[0]['nama_preferensi'] ?></dd>

                                        <dt>Jabatan :</dt>
                                        <dd><?php echo $data[0]['nama_lembaga'] ?></dd>

                                        <dt>Alamat Perekomendasi :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_preferensi']?>
                                              </address>
                                        </dd>

                                        <dt>HP / Telepon Pereferensi :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon_preferensi']?></dd>

                                        <dt>Email :</dt>
                                        <dd><i class="icon icon-envelope"></i><?php echo $data[0]['email_preferensi']?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Kelengkapan</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Fotocopy Raport Semester :</dt>
                                        <dd><?php echo ($data[0]['fc_raport']=='1'?'Terlampir' : 'Tidak Ada') ?></dd>

                                        <dt>Fotocopy KTP Orang Tua :</dt>
                                        <dd><?php echo ($data[0]['fc_ktp']=='1'?'Terlampir' : 'Tidak Ada') ?></dd>

                                        <dt>Fotocopy KK :</dt>
                                        <dd><?php echo ($data[0]['fc_kk']=='1'?'Terlampir' : 'Tidak Ada') ?></dd>

                                        <dt>Pas Foto Siswa :</dt>
                                        <dd><?php echo ($data[0]['pas_foto']=='1'?'Terlampir' : 'Tidak Ada') ?></dd>

                                        <dt>Surat Keterangan Masih Aktif :</dt>
                                        <dd><?php echo ($data[0]['ska']=='1'?'Terlampir' : 'Tidak Ada') ?></dd>

                                        <dt>Surat Keterangan Tidak Mampu :</dt>
                                        <dd><?php echo ($data[0]['sktm']=='1'?'Terlampir' : 'Tidak Ada') ?></dd>

                                        
                                    </dl>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /main-inner --> 
</div>
<!-- /main -->