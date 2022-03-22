var height = window.innerHeight - 200;
Ext.onReady(function () {
	var onAdd = false;
	Ext.define('ArchivedModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'building_name',  type: 'string'},
	         {name: 'unit_name',       type: 'string'},
	         {name: 'first_name', type: 'string'},
	         {name: 'last_name', type: 'string'},
	         {name: 'reg_date',       type: 'string'},
	         {name: 'comment',       type: 'string'}
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
		     url: 'getList',
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
		title: 'AC Maintenance List',
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
	    	{ text: 'User Name', dataIndex: 'reg_date', flex: 1,
	    		renderer: function(val, meta, record) {
	    			return `${record.data.first_name} ${record.data.last_name}`;
	    		}
	    	},
	        { text: 'Building Name',  dataIndex: 'building_name', flex: 1 },
	        { text: 'Unit Name', dataIndex: 'unit_name', flex: 1},
	        { text: 'Register Date', dataIndex: 'reg_date', flex: 1},
	        { text: 'Comment', dataIndex: 'comment', flex: 1},
	    	// { text: 'Action', flex: 1, dataIndex: 'id', sortable: false,
	     //      renderer: function(val) {
	     //      	return `<a href="${base_url}/admin/request/archivedDetail?id=${val}"><i class="fas fa-edit"></i></a>`;
	     //      }
	    	// },
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

