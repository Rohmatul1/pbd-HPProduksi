 Membuat form pencarian pendaftar
<form action="#" method="post" class="col s12 m4 offset-m8 inner-addon right-addon">
        <i class="material-icons">search</i>
        <input type="text" placeholder="Cari" name="cariPendaftar" />
</form>

Proses pencarian

<?php
    require_once 'config/koneksi.php';
    require_once 'header.php';

    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $sql = '';

    if(isset($_POST['cariPendaftar'])){
        $cari = $_POST['cariPendaftar'];
        $sql = "SELECT pendaftar.nama_pendaftar, sekolah_asal.nama_sekolah, penerimaan.status FROM pendaftar INNER JOIN sekolah_asal ON pendaftar.id_sekolah = sekolah_asal.id INNER JOIN penerimaan ON pendaftar.no_daftar = penerimaan.no_pendaftar WHERE pendaftar.nama_pendaftar LIKE '%".$cari."%' OR sekolah_asal.nama_sekolah LIKE '%".$cari."%' ";
    }else{
        $sql = 'SELECT pendaftar.nama_pendaftar, sekolah_asal.nama_sekolah, penerimaan.status FROM pendaftar INNER JOIN sekolah_asal ON pendaftar.id_sekolah = sekolah_asal.id INNER JOIN penerimaan ON pendaftar.no_daftar = penerimaan.no_pendaftar';
    }

    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
?>