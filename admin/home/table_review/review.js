//Read
$(document).ready(function(){	
	var dataTable = $('#tabelReview').DataTable({
		ajax: "data.json",
		"serverSide":true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false,
		"order":[],
		
		"ajax":{
			url:"table_review/ambilData.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2],
				"orderable":false,
			},
		],
	});
	 
	setInterval( function () {
		dataTable.ajax.reload( null, false ); // user paging is not reset on reload
	},3000);
});

	// View Data
	$(document).on('click', '.view', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"table_review/detailData.php",
            method:"POST",
            data:{
                id:id
            },
            success:function(data){
                $('#det_reviewModal').modal('show');
                $('.modal-title').text("Detail Review");
                $('#detReview').html(data);
            }
        });
	});