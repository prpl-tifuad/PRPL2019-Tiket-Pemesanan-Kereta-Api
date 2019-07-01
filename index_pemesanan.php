<?php require "./header.php"; ?>
<div class="container">

    <center>
        <h2>PEMESANAN TIKET KERETA API</h2>
    </center>
    <table>
        <thead>
            <tr>
                <th><a class="waves-effect waves-light btn btn-small cyan modal-trigger" href="index.php">JADWAL KERETA</a></th>
                <th><a class="waves-effect waves-light btn btn-small cyan modal-trigger" href="index_pemesanan.php">PEMESANAN</a></th>
                <th><a class="waves-effect waves-light btn btn-small cyan modal-trigger" href="#modal-transaksi_pemesanan">TRANSAKSI</a></th>
            </tr>
        </thead>
    </table>
    <h4>
        Pesan Tiket Kereta Api
        <a class="waves-effect waves-light btn btn-small blue modal-trigger" href="#modal1"><i class="material-icons right">create</i> Tambah</a>
    </h4>
    <form action="" method="post">
        <input type="text" name="keyword" class="form-control" size="10" placeholder="Search" autofocus autocomplete="off">
        <button type="submit" name="cari" class="waves-effect waves-ligh btn"><i class="large material-icons right">search</i>cari</button>
    </form>

    <?php
    if (isset($_POST['cari'])) {
        $cari = $_POST['keyword'];
        echo "<b>Hasil pencarian : " . $cari . "</b>";
        $QueryString = "SELECT pemesanan.id_pesan, pemesanan.nama, pemesanan.atas_nama, pemesanan.usia, pemesanan.no_kk, pemesanan.no_hp, pemesanan.tgl_pesan,
    pemesanan.jml_penumpang FROM pemesanan WHERE
    pemesanan.id_pesan LIKE '%$cari%' or pemesanan.nama LIKE '%$cari%' or pemesanan.atas_nama LIKE '%$cari%' or pemesanan.usia LIKE '%$cari%' or
    pemesanan.no_kk LIKE '%$cari%' or pemesanan.no_hp LIKE '%$cari%' or pemesanan.tgl_pesan LIKE '%$cari%' or pemesanan.jml_penumpang LIKE '%$cari%'";
        $SQL = mysqli_query($con, $QueryString);
    } else {
        $SQL = mysqli_query($con, "select * from pemesanan");
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Customer</th>
                <th>Nama</th>
                <th>Atas Nama</th>
                <th>Usia</th>
                <th>No KK</th>
                <th>No HP</th>
                <th>Tanggal Pesan</th>
                <th>Jumlah Penumpang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($data = mysqli_fetch_array($SQL) and extract($data)) { ?>
                <tr>
                    <td>
                        <?= $i++ ?>
                    </td>
                    <td>
                        <?= $id_pesan ?>
                    </td>
                    <td>
                        <?= $nama ?>
                    </td>
                    <td>
                        <?= $atas_nama ?>
                    </td>
                    <td>
                        <?= $usia ?>
                    </td>
                    <td>
                        <?= $no_kk ?>
                    </td>
                    <td>
                        <?= $no_hp ?>
                    </td>
                    <td>
                        <?= $tgl_pesan ?>
                    </td>
                    <td>
                        <?= $jml_penumpang ?>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

<form method="post" action="aksi.php" id="modal1" class="modal" style="width:300px">
    <div class="modal-content">
        <h5 class="title">Tambah Data</h5>
        <div class="row">
            <div class="input-field col s12">
                <input id="id_pesan" type="text" name="id_pesan" class="validate" autofocus autocomplete="off">
                <label for="id_pesan">No Customer</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="nama" type="text" class="validate" name="nama" autocomplete="off" autofocus>
                <label for="nama">Nama</label>
            </div>
            <div class="input-field col s12">
                <input id="atas_nama" type="text" class="validate" name="atas_nama" autocomplete="off">
                <label for="atas_nama">Atas Nama</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="usia" type="number" class="validate" name="usia" autocomplete="off">
                <label for="usia">Usia</label>
            </div>
            <div class="input-field col s12">
                <input id="no_kk" type="number" class="validate" name="no_kk" autocomplete="off">
                <label for="no_kk">No KK</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="no_hp" type="number" class="validate" name="no_hp" autocomplete="off">
                <label for="no_hp">No HP</label>
            </div>
            <div class="input-field col s12">
                <input id="tgl_pesan" type="date" class="validate" name="tgl_pesan" autocomplete="off">
                <label for="tgl_pesan">Tanggal Pemesanan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="jml_penumpang" type="number" class="validate" name="jml_penumpang" autocomplete="off">
                <label for="jml_penumpang">Jumlah Penumpang</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn blue btn-submit " name="tambah_pesan">Tambah</button>
    </div>
</form>

<div id="modal-transaksi_pemesanan" class="modal" style="width:500px">
    <div class="modal-content">
        <h5 class="title">Transaksi</h5>
        <div class="row">
            <div class="input-field col l3">
                <input id="no" type="number" class="validate" name="no">
                <label for="no">NO</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col r3">
                <input id="asal" type="text" class="validate" name="asal">
                <label for="asal">Asal</label>
            </div>
            <div class="input-field col r3">
                <input id="tujuan" type="text" class="validate" name="tujuan">
                <label for="tujuan">Tujuan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col r3">
                <input id="kelas" type="text" class="validate" name="kelas">
                <label for="kelas">Kelas</label>
            </div>
            <div class="input-field col r3">
                <input id="harga" type="number" class="validate" name="harga" onfocus="mulaiHitung()" onblur="berhentiHitung()" autofocus>
                <label class="active" for="harga">Harga</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col r3">
                <input id="jml_pesan" type="number" class="validate" name="jml_pesan" onfocus="mulaiHitung()" onblur="berhentiHitung()" autofocus>
                <label class="active" for="jml_pesan">Jumlah Pesan</label>
            </div>
            <div class="input-field col r3">
                <input id="tot_bayar" type="number" class="validate" name="tot_bayar" onfocus="mulaiHitung()" onblur="berhentiHitung()" autofocus>
                <label class="active" for="tot_bayar">Total Bayar</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col r3">
                <input id="diskon" type="number" class="validate" name="diskon" onfocus="mulaiHitung()" onblur="berhentiHitung()" autofocus>
                <label class="active" for="diskon">Diskon</label>
            </div>
            <div class="input-field col r3">
                <input id="tot_setdiskon" type="number" class="validate" name="tot_setdiskon" onfocus="mulaiHitung()" onblur="berhentiHitung()" autofocus>
                <label class="active" for="tot_setdiskon">Total Setelah Diskon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col r3">
                <input id="bayar" type="number" class="validate" name="bayar" onfocus="mulaiHitung()" onblur="berhentiHitung()" autofocus>
                <label class="active" for="bayar">Bayar</label>
            </div>
            <div class="input-field col r3">
                <input id="kembalian" type="text" class="validate" name="kembalian" onfocus="mulaiHitung()" onblur="berhentiHitung()" autofocus>
                <label class="active" for="kembalian">Kembalian</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn blue waves-effect waves-light btn-transaksi_pemesanan" name="transaksi_pemesanan">Submit<i class="material-icons right">send</i></button>
    </div>
</div>


<!--PREVIEW-->

<form method="post" action="aksi.php" id="modal-transaksi_pemesanan-preview" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col l1">No</div>
            <div class="col l3" id="sp-no"></div>
        </div>
        <div class="row">
            <div class="col l1">Asal</div>
            <div class="col l3" id="sp-asal"></div>
            <div class="col l1">Tujuan</div>
            <div class="col l3" id="sp-tujuan"></div>
            <div class="col l1">Kelas</div>
            <div class="col l3" id="sp-kelas"></div>
        </div>
        <div class="row">
            <div class="col l1">Harga</div>
            <div class="col l3" id="sp-harga"></div>
            <div class="col l1">Banyak</div>
            <div class="col l3" id="sp-jml_pesan"></div>
            <div class="col l1">Total</div>
            <div class="col l3" id="sp-tot_bayar"></div>
        </div>
        <div class="row">
            <div class="col l1">Diskon</div>
            <div class="col l3" id="sp-diskon"></div>
            <div class="col l1">Sub Diskon</div>
            <div class="col l3" id="sp-tot_setdiskon"></div>
        </div>
        <div class="row">
            <div class="col l1">Bayar</div>
            <div class="col l3" id="sp-bayar"></div>
            <div class="col l1">Kembalian </div>
            <div class="col l3" id="sp-kembalian"></div>
        </div>
        <input hidden id="preview-no" type="text" name="no">
        <input hidden id="preview-asal" type="text" name="asal">
        <input hidden id="preview-tujuan" type="text" name="tujuan">
        <input hidden id="preview-kelas" type="text" name="kelas">
        <input hidden id="preview-harga" type="text" name="harga">
        <input hidden id="preview-jml_pesan" type="text" name="jml_pesan">
        <input hidden id="preview-tot_bayar" type="text" name="tot_bayar">
        <input hidden id="preview-diskon" type="text" name="diskon">
        <input hidden id="preview-tot_setdiskon" type="text" name="tot_setdiskon">
        <input hidden id="preview-bayar" type="text" name="bayar">
        <input hidden id="preview-kembalian" type="text" name="kembalian">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn blue waves-effect waves-light" name="transaksi_pemesanan">Submit<i class="material-icons right">send</i></button>
    </div>
</form>


<script type="text/javascript">
    $(".btn-transaksi_pemesanan").click(function() {
        $("#modal-transaksi_pemesanan").modal('close')

        $("#preview-no").val($("#no").val())
        $("#sp-no").text($("#no").val())

        $("#preview-asal").val($("#asal").val())
        $("#sp-asal").text($("#asal").val())

        $("#preview-tujuan").val($("#tujuan").val())
        $("#sp-tujuan").text($("#tujuan").val())

        $("#preview-kelas").val($("#kelas").val())
        $("#sp-kelas").text($("#kelas").val())

        $("#preview-harga").val($("#harga").val())
        $("#sp-harga").text($("#harga").val())

        $("#preview-jml_pesan").val($("#jml_pesan").val())
        $("#sp-jml_pesan").text($("#jml_pesan").val())

        $("#preview-tot_bayar").val($("#tot_bayar").val())
        $("#sp-tot_bayar").text($("#tot_bayar").val())

        $("#preview-diskon").val($("#diskon").val())
        $("#sp-diskon").text($("#diskon").val())

        $("#preview-tot_setdiskon").val($("#tot_setdiskon").val())
        $("#sp-tot_setdiskon").text($("#tot_setdiskon").val())

        $("#preview-bayar").val($("#bayar").val())
        $("#sp-bayar").text($("#bayar").val())

        $("#preview-kembalian").val($("#kembalian").val())
        $("#sp-kembalian").text($("#kembalian").val())

        $("#modal-transaksi_pemesanan-preview").modal('open')
    })

    function mulaiHitung() {
        Interval = setInterval("hitung()", 1);
    }

    function hitung() {
        harga = parseInt(document.getElementById("harga").value);
        jml_pesan = parseInt(document.getElementById("jml_pesan").value);
        if (!isNaN(harga * jml_pesan)) tot_bayar = harga * jml_pesan
        else tot_bayar = ""
        document.getElementById("tot_bayar").value = tot_bayar;

        diskon = 0;
        persen = "";
        if (tot_bayar > 5000) {
            diskon = (10 / 100) * tot_bayar;
            persen = "10%";
        }
        document.getElementById("diskon").value = persen + "-->" + diskon;
        tot_setdiskon = tot_bayar - diskon;
        document.getElementById("tot_setdiskon").value = tot_setdiskon;
        bayar = parseInt(document.getElementById("bayar").value);
        if (!isNaN(bayar - tot_bayar)) kembalian = bayar - tot_bayar
        else kembalian = ""
        document.getElementById("kembalian").value = kembalian;
    }

    function berhentiHitung() {
        clearInterval(Interval);
    }
</script>

<script>
    $(document).ready(function() {
        $(".modal").modal()
    })

    $(".btn-ubah_pemesanan").click(function() {
        str = $(this).attr('value').split(',')
        $(".id_pesan").val(str[0])
        $(".nama").val(str[1])
        $(".atas_nama").val(str[2])
        $(".usia").val(str[3])
        $(".no_kk").val(str[4])
        $(".no_hp").val(str[5])
        $(".tgl_pesan").val(str[6])
        $(".jml_penumpang").val(str[7])
        $(".title").html("Ubah_pemesanan Data")
        $(".btn-submit").attr('name', 'ubah_pemesanan').html("Ubah")
        $(".id_pesan").attr('readonly', 'dik')
        $(".no_kk").attr('readonly', 'dik')
        $(".tgl_pesan").attr('readonly', 'dik')
        $("label").addClass('active')
        $(".modal").modal('open')
    })
</script>