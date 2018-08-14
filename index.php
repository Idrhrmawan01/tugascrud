<?php
include_once 'koneksi.php';
include ('login_session.php');

$sql='SELECT * FROM artikel order by tanggal DESC';
$result = mysqli_query($conn, $sql);

include('header.php');
include('sidebar.php');

if ($result):
	?> 
	<a href="tambah.php" class="btn btn-large"> Tambah artikel </a>
	<table>
		<tr>
			<th> Judul </th>
			<th> Tanggal </th>
			<th> Aksi </th>
		</tr> 
		<?php while ($row = mysqli_fetch_array($result)): ?>
			<tr>
				<td><?php echo $row['title']; ?> </td>
				<td><?php echo date("j F Y", strtotime($row['tanggal'])); ?> </td>
				<td>
					<a class="btn btn-default " href="edit.php?id=<?php echo $row['id'];?>">Edit </a>
					<a class="btn btn-alert" onclick="return confirm('Yakin Anda akan menghapus data?');" 
						href="hapus.php?id=<?php echo $row['id'];?>">Delete </a>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>
	<?php endif; ?>
	<?php
	include('footer.php');
	?>



	