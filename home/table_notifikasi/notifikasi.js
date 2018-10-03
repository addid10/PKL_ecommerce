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
				"targets":0,
                "className": 'select-checkbox',
				"orderable":false,
			},
        ],
        "select":{
            "style": 'os',
            "selector": 'td:first-child'
        },
        "order": [[ 1, 'asc' ]]
    });
    	 
	setInterval( function () {
		dataTable.ajax.reload( null, false ); // user paging is not reset on reload
	},3000);
});