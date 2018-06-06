<?php 
mysql_connect('localhost','root','');
mysql_select_db("db_fashionlook");

function form(){
?>
<form class="form-horizontal" role="form" method="post" action="?page=fashion"> 
  <div class="form-group">
    <label for="merk" class="col-sm-2 control-label">Merk Hijab</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="merk_hijab" placeholder="Merk Hijab" name="merk_hijab">
    </div>
  </div>
  <div class="form-group">
    <label for="warna" class="col-sm-2 control-label">Warna</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="warna" placeholder="Warna" name="warna">
    </div>
  </div>
  <div class="form-group">
    <label for="harga" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga">
    </div>
  </div> 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger" name="input">Submit</button>
    </div>
  </div>
</form>
<?php
}
function input(){
	$statement = sprintf("INSERT INTO data VALUES('','%s','%s','%s')",
		$_POST['merk_hijab'],
		$_POST['warna'],
		$_POST['harga']
		);
	$query = mysql_query($statement);
	if($query){
		echo "<script>alert('Data berhasil diinput')</script>";
	}else
	echo "<script>alert('Data gagal diinput')</script>";
}
function showData(){
	$query = mysql_query("SELECT * FROM data");
?>
	<h3>Data Hijab</h3>
	<table class="table table-hover table-bordered table-striped">
		<tr class="success">
			<th>No</th>
			<th>MerkHijab</th>
			<th>Warna</th>
			<th>Harga</th>
			<th>Tools</th>
		</tr>
		<?php
		$i = 1;
		while ($data = mysql_fetch_array($query)) {
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$data[1]."</td>";
			echo "<td>".$data[2]."</td>";
			echo "<td>".number_format($data[3])."</td>";
			echo "<td><a href=?page=fashion&show&aksi=hapus&id=$data[0] onclick=\"return confirm('hapus?');\"><span class='glyphicon glyphicon-trash'></span></a> &nbsp;";
			echo "<a href=?page=fashion&aksi=edit&id=$data[0]><span class='glyphicon glyphicon-edit'></span></a></td>";
			echo "</tr>";
			$i++;
		}
		?>
	</table>

<?php
}
function deleteR(){
$query = mysql_query("DELETE FROM data WHERE kodeHijab = '$_GET[id]'");

	if ($query) {
					echo "<script>alert('Berhasil')</script>";
					echo "<script>window.location='?page=fashion&show'</script>";
				}else{
					echo "<script>alert('Gagal')</script>";
				}
}
function update(){
$query = mysql_query("SELECT * FROM data");
$data = mysql_fetch_array($query);
?>
<form class="form-horizontal" role="form" method="post" action="?page=fashion&aksi=edit"> 
<div class="form-group">
    <label for="merk" class="col-sm-2 control-label">Id Hijab</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="merk_hijab" value="<?php echo $data[0] ?>" name="id" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="merk" class="col-sm-2 control-label">Merk Hijab</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="merk_hijab" value="<?php echo $data[1] ?>" name="merk_hijab">
    </div>
  </div>
  <div class="form-group">
    <label for="warna" class="col-sm-2 control-label">Warna</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="warna" value="<?php echo $data[2] ?>" name="warna">
    </div>
  </div>
  <div class="form-group">
    <label for="harga" class="col-sm-2 control-label">   Harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="harga" value="<?php echo $data[3] ?>" name="harga">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger" name="update">Update</button>
    </div>
  </div>
</form>

	<?php
		if (isset($_POST['update'])) {
			$query = mysql_query("UPDATE data SET merk = '$_POST[merk_hijab]', warna = '$_POST[warna]', harga = '$_POST[harga]' WHERE kodeHijab = '$_POST[id]'");

				if ($query) {
					echo "<script>alert('Berhasil')</script>";
					echo "<script>window.location='?page=fashion&show'</script>";
				}else{
					echo "<script>alert('Gagal')</script>";
				}
		}
	?>


<?php
}

//pilih form atau tampil data
if(isset($_GET['show'])){
	showData();
		if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
		deleteR();
	}
}else{
	form();
	if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit') {
		update();
	}
	if(isset($_POST['input'])) input();
}
?>