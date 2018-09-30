//Read
$(document).ready(function(){

	var dataTable = $('#tabelPembelian').DataTable({
		ajax: "data.json",
		"serverSide":true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false,
		"order":[],
		
		"ajax":{
			url:"table_pembelian/ambilData.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],
	});
	 
	setInterval( function () {
		dataTable.ajax.reload( null, false ); // user paging is not reset on reload
	},3000);

    //Update Edit
	$(document).on('click', '.update', function(){
		var id_transaksi_pembelian = $(this).attr("id");
		$.ajax({
			url:"table_pembelian/ambilData_tunggal.php",
			method:"POST",
			data:{id_transaksi_pembelian:id_transaksi_pembelian},
			dataType:"json",
			success:function(data)
			{
				$('#beliModal').modal('show');
				$('.modal-title').text("Update Data");
				$('#updateOperation').val("Edit");
				$('#updateButton').val("Update");
				
				$('#id_transaksi_pembelian').val(id_transaksi_pembelian);
				$('#status_beli').val(data.status_beli);
				$('#status_barang').val(data.status_barang);
			}
		})
	});

	$(document).on('submit', '#beliForm', function(event){
		$('#beliModal').modal('hide');
		event.preventDefault();
		var barang  = $('#status_barang').val();
		var beli    = $('#status_beli').val();
		swal({
			title: "Apakah anda yakin dengan pilihan anda?",
			text: "Pemberitahuan akan dikirim ke User",
			icon: "info",
			buttons: ["Belum", "Complete!"],
			dangerMode: false,
		  })
		  .then((willDelete) => {
			if (willDelete) {		
				if(barang !='' && beli !='')
				{
					$.ajax({
						url:"table_pembelian/operationData.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							dataTable.ajax.reload();
							$('#beliForm')[0].reset();
							$('#beliModal').modal('hide');
						}
					});
				}
				else
				{
					alert("Both Fields are Required");
				}
				swal("Pemberitahuan sudah dikirim!", {
					icon: "success",
				  });
			}
		});
	});
	

	// View Data
     $(document).on('click', '.view', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"table_pembelian/detailData.php",
            method:"POST",
            data:{
                id:id
            },
            success:function(data){
                $('#det_transaksiModal').modal('show');
                $('.modal-title').text("Detail Transaksi");
                $('#detailTransaksi').html(data);
            }
        });
	   });
});