<?php if(isset($_SESSION['username_member'])): ?>
<?php require_once('../profile/view-profile.php'); ?>
<h2>Profile</h2>
<div class="row mb-5">
	<?php if(!empty($profile->foto)): ?>
	<div class="col-4">
		<img class="img-radius" src="../assets/images/user/<?php echo $profile->foto;?>">
	</div>
	<?php else: ?>
	<div class="col-4">
		<img class="img-radius" src="../assets/images/lain3.png">
	</div>
	<?php endif ?>
	<div class="col-8">
		<?php if(empty($profile->nama_users)): ?>
		<p class="mb-0">Tanpa Nama</p>
		<?php else: ?>
		<p class="mb-0">
			<?= $profile->nama_users ?>
		</p>
		<?php endif ?>
		<a href="../profile/akun"><i class="fa fa-pencil"></i> Edit Profile</a>
	</div>
</div>
<?php endif?>
<h2>Category</h2>
<div class="panel-group category-products" id="accordian">
	<?php require_once('category-list.php'); ?>
	<?php foreach($list as $data): ?>
	<?php $id = $data->id_kategori ?>
	<div class="panel panel-default">
		<div class="panel-heading pt-0">
			<h4 class="panel-title  mb-0">
				<a data-toggle="collapse" data-parent="#accordian" href="#kategori<?= $id ?>">
					<span class="p-2 badge pull-right"><i class="fa fa-plus"></i></span>
					<?= $data->kategori ?> 
				</a>
			</h4>
		</div>
		<div id="kategori<?= $id ?>" class="panel-collapse collapse">
			<div class="panel-body">
				<ul>
				<?php
					$subs = $connection->prepare("SELECT * FROM sub_kategori WHERE id_kategori=:id");
					$subs->bindParam('id', $id);
					$subs->execute();
					$sub = $subs->fetchAll(PDO::FETCH_OBJ);
				?>
					<?php foreach($sub as $row): ?>
						<li><a href="../category/?q=<?=$row->sub_kategori?>"><?= $row->sub_kategori ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>