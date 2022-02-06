$(document).ready(function() {
	$("#example").DataTable({
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
	        url: base_url + "/admin/request/getPendingRequest",
	        type: 'POST',
	    },
	    columns: [
	    {data: 'building_name' },
	    {data:'unit_name'},
	    {data:'move_type',
	    	align: 'center',
	    	render: function(data, type, row) {
	    		if(row.move_type == 1) {
	    			return 'NOC MOVE IN';
	    		} else if(row.move_type == 2) {
	    			return 'NOC MOVE OUT';
	    		} else {
	    			return 'NOC MAINTENANCE';
	    		}
	    	}
		},
	    {data:'move_date'},
	    {
	        data: null,
	        render: function(data, type, row) {
	        	return `<a href="${base_url}/admin/request/pendingDetail?id=${row.id}"><i class="fas fa-edit"></i></a>`;
	            // return '\
	            //     <a href="/exam/editExam/'+row.id+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
	            //         <i class="bi bi-gear"></i>\
	            //     </a>\
	            //     <a href="javascript:showHideExam('+row.id+');" class="btn btn-sm btn-clean btn-icon" title="show exam" id="show_exam'+row.id+'">\
	            //         <i class="bi '+row.icon+'"><input type="hidden" id="showFlag" value="'+row.toggle+'"></i>\
	            //     </a>\
	            //     <a href="javascript:" class="btn btn-sm btn-clean btn-icon" title="Download">\
	            //         <i class="bi bi-download"></i>\
	            //     </a>\
	            //     <a href="javascript:" class="btn btn-sm btn-clean btn-icon" title="Result">\
	            //         <i class="bi bi-file-earmark-text-fill"></i>\
	            //     </a>\
	            //     <a href="javascript:deleteExam('+row.id+');" class="btn btn-sm btn-clean btn-icon" title="Delete">\
	            //         <i class="bi bi-trash"></i>\
	            //     </a>\
	            // ';
	        }
	    }],
	});
});