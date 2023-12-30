<?php
if (isset($_GET['tipe'])) {
    if ($_GET['tipe'] == 'tambah') {
        echo "
            <h3>Tambah Data berita</h3>
            <form method='post' action='module/berita/proses_tambah.php'>
                <table width='100%'>
                    <tr>
                        <td>Judul Berita</td>
                        <td><input type='text' name='judul' size='100' /></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name='kategori'>";

                            $sql = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nm_kategori ASC");
                            while ($k = mysqli_fetch_array($sql)) {
                                echo "<option value='{$k['id']}'>{$k['nm_kategori']}</option>";
                            }

                            echo "</select>
                        </td>
                    </tr>
                    <tr>
                        <td valign='top'>Isi Berita</td>
                        <td>
                            <textarea name='isi'>" . (isset($de['isi']) ? $de['isi'] : '') . "</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value='simpan'/>
                            <input type='button' value='Batal' onClick='history.back();'/>
                        </td>
                    </tr>
                </table>
            </form>";
    } elseif ($_GET['tipe'] == 'edit') {
        $sql = mysqli_query($conn, "SELECT * FROM berita WHERE id='$_GET[id]'");
        $de = mysqli_fetch_array($sql);
        echo "
            <h3>Edit Data berita</h3>
            <form method='post' action='module/berita/proses_edit.php'>
               <input type='hidden' name='id' value='$de[id]' />
			   <table width='100%'>
                    <tr>
                        <td>Judul Berita</td>
                        <td><input type='text' name='judul' size='100' value='$de[judul]' /></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name='kategori'>";
                            $sql = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nm_kategori ASC");
                            while ($k = mysqli_fetch_array($sql)) {
                                echo "<option value='{$k['id']}'>{$k['nm_kategori']}</option>";
                            }

                            echo "</select>
                        </td>
                    </tr>
                    <tr>
                        <td valign='top'>Isi Berita</td>
                        <td>
                            <textarea name='isi'>" . (isset($de['isi']) ? $de['isi'] : '') . "</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value='update'/>
                            <input type='button' value='Batal' onClick='history.back();'/>
                        </td>
                    </tr>
                </table>
            </form>";
    }
} else {
    echo "
        <h3>Manajemen berita</h3>
        <a href='?m=berita&tipe=tambah'>Tambah Data</a>
        <table border='1' width='100%' cellspacing='0'>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>";

    $sql = mysqli_query($conn, "SELECT * FROM berita ORDER BY id ASC");
    $no = 1;
    while ($k = mysqli_fetch_array($sql)) {
        echo "<tr>
                <td align='center'>$no</td>
                <td>{$k['judul']}</td>
                <td align='center' width='140px'>
                    <a href='?m=berita&tipe=edit&id={$k['id']}'>Edit</a> |
                    <a href='module/berita/proses_hapus.php?id={$k['id']}' onClick='return confirm(\"Anda yakin akan menghapus?\")'>Hapus</a>
                </td>
            </tr>";
        $no++;
    }

    echo "</table>";
}
?>
