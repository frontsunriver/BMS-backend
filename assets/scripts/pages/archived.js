// $(document).ready(function() {
// 	$("#example").DataTable({
// 	    "language": {
// 	        "paginate": {
// 	            "first":      "First",
// 	            "last":       "Last",
// 	            "next":       ">",
// 	            "previous":   "<"
// 	        },
// 	    },
// 	    initComplete: function () {
// 	        this.api().columns().every( function () {
// 	            var that = this;
// 	            $( 'input', this.footer() ).on( 'keyup change clear', function () {
// 	                if ( that.search() !== this.value ) {
// 	                    that
// 	                        .search( this.value )
// 	                        .draw();
// 	                }
// 	            });
// 	        });
// 	    },
// 	    ajax: {
// 	        url: base_url + "/admin/request/getArchivedRequest",
// 	        type: 'POST',
// 	    },
// 	    columns: [
// 	    {data: 'building_name'},
// 	    {data:'unit_name'},
// 	    {data:'move_type',
// 	    	align: 'center',
// 	    	render: function(data, type, row) {
// 	    		if(row.move_type == 1) {
// 	    			return 'NOC MOVE IN';
// 	    		} else if(row.move_type == 2) {
// 	    			return 'NOC MOVE OUT';
// 	    		} else {
// 	    			return 'NOC MAINTENANCE';
// 	    		}
// 	    	}
// 		},
// 	    {data:'move_date'},
// 	    {data:'status',
// 	    	render: function(data, type, row) {
// 	    		if(row.status == 2) {
// 	    			return 'APPROVED';
// 	    		} else {
// 	    			return 'REJECTED';
// 	    		}
// 	    	}
// 		},
// 	    {
// 	        data: null,
// 	        render: function(data, type, row) {
// 	        	return `<a href="${base_url}/admin/request/archivedDetail?id=${row.id}"><i class="fas fa-edit"></i></a>`;
// 	            // return '\
// 	            //     <a href="/exam/editExam/'+row.id+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
// 	            //         <i class="bi bi-gear"></i>\
// 	            //     </a>\
// 	            //     <a href="javascript:showHideExam('+row.id+');" class="btn btn-sm btn-clean btn-icon" title="show exam" id="show_exam'+row.id+'">\
// 	            //         <i class="bi '+row.icon+'"><input type="hidden" id="showFlag" value="'+row.toggle+'"></i>\
// 	            //     </a>\
// 	            //     <a href="javascript:" class="btn btn-sm btn-clean btn-icon" title="Download">\
// 	            //         <i class="bi bi-download"></i>\
// 	            //     </a>\
// 	            //     <a href="javascript:" class="btn btn-sm btn-clean btn-icon" title="Result">\
// 	            //         <i class="bi bi-file-earmark-text-fill"></i>\
// 	            //     </a>\
// 	            //     <a href="javascript:deleteExam('+row.id+');" class="btn btn-sm btn-clean btn-icon" title="Delete">\
// 	            //         <i class="bi bi-trash"></i>\
// 	            //     </a>\
// 	            // ';
// 	        }
// 	    }],
// 	});
// });

var height = window.innerHeight - 200;
Ext.onReady(function () {
	var onAdd = false;
	Ext.define('ArchivedModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'building_name',  type: 'string'},
	         {name: 'unit_name',       type: 'string'},
	         {name: 'move_type',       type: 'string'},
	         {name: 'move_date',       type: 'string'},
	         {name: 'status',       type: 'string'}
	     ]
	});

	Ext.define('BuildingComboModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'name',  type: 'string'},
	     ]
	});

	var archivedStore = Ext.create('Ext.data.Store', {
		 model: 'ArchivedModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getArchivedRequest',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     },
		 },
		 listeners: {
		 	beforeload: function(store, op, eopts) {
		 		if(role == 1) {
		 			console.log(1);
		 			store.getProxy().setExtraParam('building_id', building_id);
		 		}
		 	}
		 },
		 autoLoad: true,
	});

	var buildingComboStore = Ext.create('Ext.data.Store', {
		 model: 'BuildingComboModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getBuildingComboList',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     }
		 },
		 autoLoad: true,
		 listeners: {
		 	beforeload: function(store, op, eopts) {
		 		if(role == 1) {
		 			store.getProxy().setExtraParam('id', building_id);
		 		}
		 	}
		 }	
	});

	var buildingCombo = Ext.create('Ext.form.ComboBox', {
	    store: buildingComboStore,
	    queryMode: 'local',
	    displayField: 'name',
	    valueField: 'id',
	    name: 'building_id',
	    listeners: {
	    	change: function(t, newValue, oldValue, eopts) {
	    		archivedStore.getProxy().setExtraParam('building_id', newValue);
	    		archivedStore.load();
	    	}
	    }
	});

	var grid = Ext.create('Ext.grid.Panel', {
		title: 'Archived List',
	    store: archivedStore,
	    flex: 3,
	    tbar: ['->',
	      buildingCombo,
		  {
		  	xtype: 'textfield',
			listeners: {
			  	change: function(t, newValue, oldValue, eopts){
			  		searchBuilding(newValue);
			  	}
			}
		  },],
	    columns: [
	        { text: 'Building Name',  dataIndex: 'building_name', flex: 1 },
	        { text: 'Unit Name', dataIndex: 'unit_name', flex: 1},
	        { text: 'Move Type', dataIndex: 'move_type', flex: 1, renderer: function(val) {
	        	if(val == 1) {
	    			return 'NOC MOVE IN';
	    		} else if(val == 2) {
	    			return 'NOC MOVE OUT';
	    		} else {
	    			return 'NOC MAINTENANCE';
	    		}
	        }},
	        { text: 'Move Date', dataIndex: 'move_date', flex: 1},
	        { text: 'Status', dataIndex: 'status', flex: 1,
	          renderer: function(val) {
	          	if(val == 2) {
	    			return 'APPROVED';
	    		} else {
	    			return 'REJECTED';
	    		}
	          }
	    	},
	    	{ text: 'Action', flex: 1, dataIndex: 'id', sortable: false,
	          renderer: function(val) {
	          	return `<a href="${base_url}/admin/request/archivedDetail?id=${val}"><i class="fas fa-edit"></i></a>`;
	          }
	    	},
	    ],
	    dockedItems: [{
	        xtype: 'pagingtoolbar',
	        store: archivedStore,   // same store GridPanel is using
	        dock: 'bottom',
	        displayInfo: true
	    }],
	    height: height,
	});

	var buildingForm = Ext.create('Ext.form.Panel', {
		id: 'buildingForm',
	    bodyPadding: 20,
	    width: 250,
	    url: 'save-form.php',
	    layout: 'anchor',
	    defaults: {
	        anchor: '100%'
	    },
	    formBind: true,
	    items: [
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'First Name',
		        name: 'first_name',
		        allowBlank: false
		    },
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'Last Name',
		        name: 'last_name',
		        allowBlank: false
		    },
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'Email',
		        id: 'email',
		        name: 'email',
		        allowBlank: false
		    },
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'Mobile',
		        name: 'mobile',
		        allowBlank: true
		    },
		    {	
		    	xtype: 'hiddenfield',
		    	name: 'id'
		    }
	    ],
	    buttons: [
	    {
	        text: 'Submit',
	        id: 'submit',
	        formBind: true, //only enabled once the form is valid
	        disabled: true,
	        handler: function() {
	            buildingAction();
	        }
	    },
	    {
	        text: 'Close',
	        handler: function() {
	            Ext.getCmp('building_window').hide();
	        }
	    }],
	});

	function searchBuilding(text) {
		archivedStore.getProxy().setExtraParam('query', text)
		archivedStore.load();
	}

	function buildingAction() {
		var url = "";
		var form = Ext.getCmp('buildingForm').getForm();
		if(onAdd) {
			url = "adminAdd";
		} else {
			url = "userUpdate";
		}
		
        if (form.isValid()) {
            form.submit({
            	method: 'POST',
            	url: url,
            	data: {
            		type: 2
            	},
                success: function(form, action) {
                	if(action.result.success) {
                		Ext.Msg.alert('Success', action.result.message);	
                		Ext.getCmp('building_window').hide();
                		userStore.load();
                	}else {
                		Ext.Msg.alert('Failed', action.message);
                	}
                },
                failure: function(form, action) {
                    Ext.Msg.alert('Failed', action.result.message);
                }
            });
        }
	}

	Ext.create('Ext.panel.Panel', {
		height: height,
	    width: '100%',
	    layout: {
	        type: 'hbox',
	        align: 'center'
	    },
	    items: [grid],
	    renderTo: 'javascriptrender'
	});
});

