$(document).ready(function() {
	$("#issueTable").DataTable({
	    "language": {
	        "paginate": {
	            "first":      "First",
	            "last":       "Last",
	            "next":       ">",
	            "previous":   "<"
	        },
	    },
	    initComplete: function () {
	        this.api().columns().every( function () {
	            var that = this;
	            $( 'input', this.footer() ).on( 'keyup change clear', function () {
	                if ( that.search() !== this.value ) {
	                    that
	                        .search( this.value )
	                        .draw();
	                }
	            });
	        });
	    },
	    ajax: {
	        url: base_url + "/admin/issue/getIssue",
	        type: 'POST',
	    },
	    columns: [
	    {data:'content'},
	    {data:'',
	    	render: function(data, type, row) {
	    		return row.first_name + " " + row.last_name;
	    	}
		},
	    {data:'submit_date'},
	    {
	        data: null,
	        render: function(data, type, row) {
	        	return `<a href="${base_url}/admin/issue/repairDetail?id=${row.id}"><i class="fas fa-edit"></i></a>
	        			<a target="_blank" href="${base_url}/${row.photofile}"><i class="fas fa-eye"></i></a>`;
	        }
	    }],
	});
});