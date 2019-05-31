//Read
$(document).ready(function () {
	var dataTable = $('#tabelReview').DataTable({
		"serverSide": true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false,
		"order": [],
		"ajax": {
			url: "ambil.php",
			type: "POST",
			dataType: "json"
		},
		"columnDefs": [{
			"targets": [0, 2, 3],
			"orderable": false,
		}, ],
	});
});

// View Data
$(document).on('click', '.view', function () {
	var id = $(this).attr("id");
	$.ajax({
		url: "detail.php",
		method: "POST",
		data: {
			id: id
		},
		success: function (data) {
			$('#det_reviewModal').modal('show');
			$('.modal-title').text("Detail Review");
			$('#detReview').html(data);
		}
	});
});