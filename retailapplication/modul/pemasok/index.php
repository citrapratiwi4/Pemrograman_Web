<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<div class="border-bottom d-flex justify-content-between py-3"> 
    <h4>Data Pemasok</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus"></i> Tambah Pemasok
    </button>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemasok</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="modul/pemasok/proses.php?aksi=tambah" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="namapemasok">Nama Pemasok</label>
                        <input class="form-control" type="text" name="namapemasok" placeholder="Masukkan nama pemasok" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control" type="text" name="alamat" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="telepon">Telepon</label>
                        <input class="form-control" type="text" name="telepon" placeholder="Masukkan telepon" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="" disabled selected>Pilih status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
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

<table id="myTable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemasok</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql_pemasok = "SELECT * FROM pemasok ORDER BY id_pemasok ASC";
        $result_pemasok = $mysqli->query($sql_pemasok);
        $no = 0;
        while ($row_pemasok = $result_pemasok->fetch_assoc()) {
            $no++;
        ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row_pemasok['nama_pemasok']; ?></td>
            <td><?= $row_pemasok['alamat']; ?></td>
            <td><?= $row_pemasok['telepon']; ?></td>
            <td>
                <span class="badge <?= $row_pemasok['status'] == 1 ? 'text-bg-success' : 'text-bg-danger'; ?>">
                    <?= $row_pemasok['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                </span>
            </td>
            <td>
                <!-- Icon Edit -->
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row_pemasok['id_pemasok']; ?>" class="text-info">
                <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit<?= $row_pemasok['id_pemasok']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pemasok</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="modul/pemasok/proses.php?aksi=edit&id=<?= $row_pemasok['id_pemasok']; ?>" method="post">
                                <!-- Edit Fields -->
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Icon Hapus -->
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row_pemasok['id_pemasok']; ?>" class="text-danger">
                    <i class="bi bi-trash-fill"></i>
                </a>

                <!-- Modal Hapus -->
                <div class="modal fade" id="modalHapus<?= $row_pemasok['id_pemasok']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Pemasok</h1>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus data pemasok ini?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="modul/pemasok/proses.php?aksi=hapus&id=<?= $row_pemasok['id_pemasok']; ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>