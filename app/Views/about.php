<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>

	<div class="col-md-8">
		<h1>Hello World</h1>
	</div>
	<div class="col-md-4">
		<?= $this->include('template/sidebar') ?>
	</div>
	


<?= $this->endSection() ?>