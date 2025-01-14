<div class="border-buttom d-flex justify-content-between py-3">
    <h4>Data Barang</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
    <i class="bi bi-plus"></i> Tambah Barang</button>
    <!--Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="modul/barang/proses.php?aksi=tambah" method="post">
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="pemasok" class="form-label">pemasok</label>
                            <select name="pemasok" class="form-select" required>
                                <option value="" disabled selected>Pilih Pemasok</option>
                                <?php
                                $sql_pemasok = "SELECT * FROM pemasok WHERE status=1";
                                $result_pemasok = $mysqli->query($sql_pemasok);
                                while($row_pemasok = $result_pemasok->fetch_assoc()){
                                ?>
                                    <option value="<?= $row_pemasok['id_pemasok'];?>"><?= $row_pemasok['nama_pemasok'];?></option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang"  placeholder="Contoh : Pensil" required>
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control" name="merk"  placeholder="Contoh : Abc" required>
                        </div>
                        <div class="mb-3">
                            <label for="ukuran" class="form-label">Ukuran</label>
                            <input type="text" class="form-control" name="ukuran"  placeholder="Contoh : Sedang" required>
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" name="satuan"  placeholder="Contoh : Pcs" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php
                                $sql_kategori = "SELECT * FROM kategori WHERE status=1";
                                $result_kategori = $mysqli->query($sql_kategori);
                                while ($row_kategori = $result_kategori->fetch_assoc()) {
                                    ?>
                                    <option value="<?= $row_kategori['id_kategori'];?>"><?= $row_kategori['nama_kategori'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <input type="text" class="form-control" name="harga_beli"  placeholder="Contoh : 5000" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <input type="text" class="form-control" name="harga_jual"  placeholder="Contoh : 7000" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi"  placeholder="Contoh : Barang Baru" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
            </div>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Pemasok</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Ukuran</th>
                        <th>Satuan</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_barang = "SELECT * FROM barang a INNER JOIN pemasok b ON a.id_pemasok=b.id_pemasok INNER JOIN kategori c ON a.id_kategori = c.id_kategori ORDER BY a.id_barang ASC";
                    $result_barang = $mysqli->query($sql_barang);
                    $no = 0;
                    while ($row_barang = $result_barang->fetch_assoc()) {
                        $no++;
                    ?>
                    <tr>
                        <td><?=$no; ?></td>
                        <td><?=$row_barang['nama_pemasok']; ?></td>
                        <td><?=$row_barang['nama_barang']; ?></td>
                        <td><?=$row_barang['merk']; ?></td>
                        <td><?=$row_barang['ukuran']; ?></td>
                        <td><?=$row_barang['satuan']; ?></td>
                        <td><?=$row_barang['nama_kategori']; ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <span>RP.</span>
                                <span><?= number_format($row_barang['harga_beli'],0,',','.');?></span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <span>RP.</span>
                                <span><?= number_format($row_barang['harga_jual'],0,',','.');?></span>
                            </div>
                        </td>
                        <td><?= $row_barang['deskripsi_barang'];?></td>
                        <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row_barang['id_barang']; ?>" class="text-info"><i class="bi bi-pencil-square"></i></a>
                            <div class="modal fade" id="modalEdit<?= $row_barang['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Barang</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="Close"></button>
                                            </div>
                                            <form action="modul/barang/proses.php?aksi=edit&id=<?= $row_barang['id_barang']; ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="pemasok">Pemasok</label>
                                                        <select name="pemasok" class="form-select" required>
                                                            <option value=""disabled selected>Pilih Pemasok</option>
                                                            <?php
                                                                $sql_pemasok = "SELECT * FROM pemasok WHERE status=1";
                                                                $result_pemasok = $mysqli->query($sql_pemasok);
                                                                while($row_pemasok = $result_pemasok->fetch_assoc()){
                                                            ?>
                                                                <option value="<?= $row_pemasok['id_pemasok'];?>"<?= $row_barang['id_pemasok'] == $row_pemasok['id_pemasok']?'selected':'';?>><?= $row_pemasok['nama_pemasok'];?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" name="nama_barang"  placeholder="Contoh : Pensil"  value="<?= $row_barang['nama_barang'];?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="merk" class="form-label">Merk</label>
                                                        <input type="text" class="form-control" name="merk"  placeholder="Contoh : Abc"  value="<?= $row_barang['merk'];?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ukuran" class="form-label">Ukuran</label>
                                                        <input type="text" class="form-control" name="ukuran"  placeholder="Contoh : Sedang"  value="<?= $row_barang['ukuran'];?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="satuan" class="form-label">Satuan</label>
                                                        <input type="text" class="form-control" name="satuan"  placeholder="Contoh : Pcs"  value="<?= $row_barang['satuan'];?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kategori" class="form-label">Kategori</label>
                                                        <select name="kategori" class="form-select" required>
                                                        <option value="" disabled selected>Pilih Kategori</option>
                                                        <?php
                                                            $sql_kategori = "SELECT * FROM kategori WHERE status=1";
                                                            $result_kategori = $mysqli->query($sql_kategori);
                                                            while ($row_kategori = $result_kategori->fetch_assoc()) {
                                                        ?>
                                                            <option value="<?= $row_kategori['id_kategori'];?>"<?= $row_barang['id_kategori'] == $row_kategori['id_kategori']?'selected':'';?>><?= $row_kategori['nama_kategori'];?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harga_beli" class="form-label">Harga Beli</label>
                                                        <input type="text" class="form-control" name="harga_beli"  placeholder="Contoh : 5000"  value="<?= $row_barang['harga_beli'];?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harga_jual" class="form-label">Harga Jual</label>
                                                        <input type="text" class="form-control" name="harga_jual"  placeholder="Contoh : 7000"  value="<?= $row_barang['harga_jual'];?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="deskripsi"  placeholder="Contoh : Barang Baru" value="<?= $row_barang['deskripsi_barang'];?>" required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row_barang['id_barang']; ?>" class="text-danger"><i class="bi bi-trash-fill"></i></a>
                                <div class="modal fade" id="modalHapus<?= $row_barang['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Barang</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data Barang ini <?= $row_barang['nama_barang'];?>?
                                            </div>
                                                    <div class="modal-footer"> 
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <form action="modul/barang/proses.php?aksi=hapus&id=<?= $row_barang['id_barang'];?>" method="post">
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td> 
                                </tr>   
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            </script>