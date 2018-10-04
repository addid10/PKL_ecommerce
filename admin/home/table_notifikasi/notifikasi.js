//Read
$(document).ready(function(){
         
	var dataTable = $('#tabelNotifikasi').DataTable({
		ajax: "data.json",
		"serverSide":true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false,
		"order":[],
		
		"ajax":{
			url:"table_notifikasi/ambilData.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
        ]
    });
    	 
	setInterval( function () {
		dataTable.ajax.reload( null, false ); // user paging is not reset on reload
	},3000);


	$(document).on('click', '.accept', function(){
		var id_trans = $(this).attr("id");
		$.ajax({
			url:"table_notifikasi/bacaData.php",
			method:"POST",
			data:{id_trans:id_trans},
			success:function(data)
			{
				dataTable.ajax.reload();
			}
		});
	});
});