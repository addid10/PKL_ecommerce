//Read
$(document).ready(function(){
	$('#addButton').click(function(){
		$('#addForm')[0].reset();
		$('.modal-title').text("Tambah Data");
		$('#actionButton').val("Tambah");
		$('#operation').val("Add");
		$('#uploadImage').html('');
	});
	
	var dataTable = $('#tabelBarang').DataTable({
		ajax: "data.json",
		"serverSide":true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false,
		"order":[],
		
		"ajax":{
			url:"table_barang/ambilData.php",
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

    //Add
	$(document).on('submit', '#service_form', function(event){
		event.preventDefault();
		var nama      = $('#Nama_Service').val();
		var alamat    = $('#Alamat_Service').val();
		var waktu     = $('#waktuBuka').val();
		var lat       = $('#latitud').val();
		var long      = $('#longitud').val();
		var daftar	  = $('#Daftar_Service').val();
		var username  = $('#username').val();
		var extension = $('#Foto_Service').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#Foto_Service').val('');
				return false;
			}
		}	
		if(nama != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					$('#service_form')[0].reset();
					$('#serviceModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
    
    //Update Edit
	$(document).on('click', '.update', function(){
		var id_barang = $(this).attr("id");
		$.ajax({
			url:"ambilData_tunggal.php",
			method:"POST",
			data:{id_barang:id_barang},
			dataType:"json",
			success:function(data)
			{
				$('#addModal').modal('show');
				$('.modal-title').text("Update Data");
				
				$('#id_barang').val(idService);
				$('#nama_barang').val(data.Nama_Service);
				$('#harga').val(data.Alamat_Service);
				$('#keterangan').val(data.latitud);
				$('#merk_barang').val(data.longitud);
				
				$('#service_uploaded_image').html(data.Foto_Service);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
     // View Data
     $(document).on('click', '.view', function(){
        var id_barang = $(this).attr("id");
        $.ajax({
            url:"table_barang/detailData.php",
            method:"POST",
            data:{
                id_barang:id_barang
            },
            success:function(data){
                $('#detailModal').modal('show');
                $('.modal-title').text("Detail Barang");
                $('#detailData').html(data);
            }
        });
	   });
	   
	//Delete Data 
	$(document).on('click','.delete',function(){

		swal({
			title: "Hehe gimana nih?",
			text: "Once deleted, you will not be able to recover this Data!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				var idService = $(this).attr("id");
		
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{idService:idService},
				success:function(data)
				{
					dataTable.ajax.reload();
				}
			});
			  swal("Your Data Deleted", {
				icon: "success",
			  });
			} 
		  });


	})


});