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
	$(document).on('submit', '#addForm', function(event){
		event.preventDefault();
		var nama     = $('#nama_barang').val();
		var harga    = $('#harga').val();
		var merk     = $('#merk_barang').val();
		var ket      = $('#keterangan').val();
		var sub      = $('#sub_kategori').val();
		var sup      = $('#supplier').val();
		var extension= $('#foto').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#foto').val('');
				return false;
			}
		}	
		if(nama !='')
		{
			$.ajax({
				url:"table_barang/operationData.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					$('#addForm')[0].reset();
					$('#addModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});

	$(document).ready(function(){
		$(document).on('click', '#addButton', function(){
			$('#kategori').show();
			$('#sub_kategori').show();
			$('#kat').show();
			$('#sub').show();
		})
	});

	$(document).ready(function(){
		$(document).on('click', '#kategori', function(){
			var id_kategori = $(this).val();
			$.ajax({
				url:"table_barang/kategoriData.php",
				method:"POST",
				data: {
					id_kategori:id_kategori
				},
				success:function(data)
				{
					$('#sub_kategori').html(data);
				}
			})
		})
	});

    //Update Edit
	$(document).on('click', '.update', function(){
		
		var id_barang = $(this).attr("id");
		$.ajax({
			url:"table_barang/ambilData_tunggal.php",
			method:"POST",
			data:{id_barang:id_barang},
			dataType:"json",
			success:function(data)
			{
				$('#addModal').modal('show');
				$('.modal-title').text("Update Data");
				
				$('#id_barang').val(id_barang);
				$('#nama_barang').val(data.nama_barang);
				$('#harga').val(data.harga);
				$('#keterangan').val(data.keterangan);
				$('#merk_barang').val(data.merk_barang);
				$('#kat').hide();
				$('#sub').hide();
				$('#supplier').hide();
				
				$('#uploadImage').html(data.foto);
				$('#actionButton').val("Update");
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
			title: "Apa anda yakin ingin?",
			text: "Sekali hapus, data tidak akan bisa dikembalikan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				var id_barang = $(this).attr("id");
		
			$.ajax({
				url:"table_barang/deleteData.php",
				method:"POST",
				data:{id_barang:id_barang},
				success:function(data)
				{
					dataTable.ajax.reload();
				}
			});
			  swal("Data Berhasil di hapus!", {
				icon: "success",
			  });
			} 
		  });


	})


});