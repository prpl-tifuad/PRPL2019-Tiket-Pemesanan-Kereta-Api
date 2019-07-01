<?php require "./header.php" ?>
<div class="container">
    <center>
        <h2>PEMESANAN TIKET KERETA API</h2>
    </center>

    <table>
        <thead>
            <tr>
                <th><a class="waves-effect waves-light btn btn-small cyan modal-trigger" href="index.php">JADWAL KERETA</a></th>
                <th><a class="waves-effect waves-light btn btn-small cyan modal-trigger" href="index_pemesanan.php">PEMESANAN</a></th>
                <th><a class="waves-effect waves-light btn btn-small cyan modal-trigger" href="#modal-transaksi">TRANSAKSI</a></th>
            </tr>
        </thead>
    </table>
    <h4>
        Jadwal Kereta Api
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
        $QueryString = "SELECT kereta.kode, kereta.asal, kereta.tujuan, kereta.kelas, kereta.harga, kereta.tanggal, kereta.waktu FROM kereta WHERE
    kereta.kode LIKE '%$cari%' or kereta.asal LIKE '%$cari%' or kereta.tujuan LIKE '%$cari%' or kereta.kelas LIKE '%$cari%' or kereta.harga LIKE '%$cari%' or kereta.tanggal LIKE '%$cari%' or kereta.waktu LIKE '%$cari%'";
        $SQL = mysqli_query($con, $QueryString);
    } else {
        $SQL = mysqli_query($con, "select * from kereta");
    }

    ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>asal</th>
                <th>Tujuan</th>
                <th>Kelas</th>
                <th>Harga</th>
                <th>Tanggal Berangkat</th>
                <th>Waktu Keberantakan</th>
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
                        <?= $kode ?>
                    </td>
                    <td>
                        <?= $asal ?>
                    </td>
                    <td>
                        <?= $tujuan ?>
                    </td>
                    <td>
                        <?= $kelas ?>
                    </td>
                    <td>
                        <?= $harga ?>
                    </td>
                    <td>
                        <?= $tanggal ?>
                    </td>
                    <td>
                        <?= $waktu ?>
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
                <input id="no" type="text" class="validate" name="no" autocomplete="off">
                <label for="no">kode</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="asal" type="text" class="validate" name="asal" required autocomplete="off">
                <label for="asal">Asal</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="tujuan" type="text" class="validate" name="tujuan" required autocomplete="off">
                <label for="tujuan">Tujuan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="kelas" type="text" class="validate" name="kelas" required autocomplete="off">
                <label for="kelas">Kelas</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="harga" type="text" class="validate" name="harga" required autocomplete="off">
                <label for="harga">Harga</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="tanggal" type="date" class="validate" name="tanggal" required autocomplete="off">
                <label for="tanggal">Tanggal Brangkat</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="waktu" type="time" class="validate" name="waktu" required autocomplete="off">
                <label for="waktu">Waktu Keberangkatan</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn blue btn-submit " name="tambah_kereta">Tambah</button>
    </div>
</form>

<div id="modal-transaksi" class="modal" style="width:300px">
    <div class="modal-content">
        <h5 class="title">Transaksi</h5>
        <div class="row">
            <div class="input-field col s12">
                <input id="no" type="number" class="validate" name="no" autofocus autocomplete="off">
                <label for="no">NO</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="asal" type="text" class="validate" name="asal" autocomplete="off">
                <label for="asal">Asal</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="tujuan" type="text" class="validate" name="tujuan" autocomplete="off">
                <label for="tujuan">Tujuan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="kelas" type="text" class="validate" name="kelas" autocomplete="off">
                <label for="kelas">Kelas</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="harga" type="text" class="validate" name="harga" onfocus="mulaiHitung()" onblur="berhentiHitung()" autocomplete="off">
                <label for="harga">Harga</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="jml_pesan" type="text" class="validate" name="jml_pesan" onfocus="mulaiHitung()" onblur="berhentiHitung()" autocomplete="off">
                <label for="jml_pesan">Jumlah Pesan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="tot_bayar" type="text" class="validate" name="tot_bayar" onfocus="mulaiHitung()" onblur="berhentiHitung()" autocomplete="off">
                <label for="tot_bayar">Total Bayar</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder id="diskon" type="text" class="validate" name="diskon" onfocus="mulaiHitung()" onblur="berhentiHitung()" autocomplete="off">
                <label for="diskon">Diskon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="tot_setdiskon" type="text" class="validate" name="tot_setdiskon" onfocus="mulaiHitung()" onblur="berhentiHitung()" autocomplete="off">
                <label for="tot_setdiskon">Total Setelah Diskon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="bayar" type="text" class="validate" name="bayar" onfocus="mulaiHitung()" onblur="berhentiHitung()" autocomplete="off">
                <label for="bayar">Bayar</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="kembalian" type="text" class="validate" name="kembalian" onfocus="mulaiHitung()" onblur="berhentiHitung()" autocomplete="off">
                <label for="kembalian">Kembalian</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn blue waves-effect waves-light btn-transaksi" name="transaksi_pemesanan">Submit<i class="material-icons right">send</i></button>
    </div>
</div>


<!--PREVIEW-->

<form method="post" action="aksi.php" id="modal-transaksi-preview" class="modal">
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
    $(".btn-transaksi_pemesanan").click(function() {
        $("#modal-transaksi").modal('close')

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

        $("#modal-transaksi-preview").modal('open')
    })
</script>
</form>

<script>
    $(document).ready(function() {
        $(".modal").modal()
    })

    $(".btn-ubah1").click(function() {
        str = $(this).attr('value').split(',')
        $(".no").val(str[0])
        $(".asal").val(str[1])
        $(".tujuan").val(str[2])
        $(".kelas").val(str[3])
        $(".harga").val(str[4])
        $(".tanggal").val(str[5])
        $(".waktu").val(str[6])
        $(".title").html("Ubah1 Data")
        $(".btn-submit").attr('name', 'ubah1').html("Ubah")
        $(".no").attr('readonly', 'dik')
        $(".asal").attr('readonly', 'dik')
        $(".tujuan").attr('readonly', 'dik')
        $("label").addClass('active')
        $(".modal").modal('open')
    })
</script>