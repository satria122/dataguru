<?php include 'include/global.php';
include 'include/function.php'; ?>
<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilSidik();
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}
	function tampilSidik() {
		<?php $user = getUser(); ?>
		$.get('<?php echo $user; ?>', function(data) {
			MyTable.fnDestroy();
			('#data-sidik').html(data);
			refresh();
		});
	}
</script>