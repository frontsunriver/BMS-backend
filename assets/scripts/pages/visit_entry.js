var height = window.innerHeight - 200;
Ext.onReady(function () {
	var onAdd = false;
	Ext.define('ArchivedModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'building_id',  type: 'string'},
	         {name: 'unit_id',       type: 'string'},
	         {name: 'building_name',  type: 'string'},
	         {name: 'unit_name',       type: 'string'},
	         {name: 'mobile',       type: 'string'},
	         {name: 'name',       type: 'string'},
	         {name: 'visit_date',       type: 'string'},
	         {name: 'visit_time',       type: 'string'},
	         {name: 'purpose',       type: 'string'},
	         {name: 'company',       type: 'string'},
	         {name: 'emirates_id',  type: 'string'},
	         {name: 'eid',       type: 'string'}
	     ]
	});

	Ext.define('BuildingComboModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'name',  type: 'string'},
	     ]
	});

	Ext.define('UnitComboModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'unit_name',  type: 'string'},
	     ]
	});

	var archivedStore = Ext.create('Ext.data.Store', {
		 model: 'ArchivedModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getVisitList',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     },
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
		 autoLoad: true	
	});

	var unitComboStore = Ext.create('Ext.data.Store', {
		 model: 'UnitComboModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getUnitComboList',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     }
		 },
		 autoLoad: true	
	});

	var buildingCombo = Ext.create('Ext.form.ComboBox', {
	    fieldLabel: 'Building',
	    store: buildingComboStore,
	    queryMode: 'local',
	    displayField: 'name',
	    valueField: 'id',
	    name: 'building_id',
	    allowBlank: false,
	    listeners: {
	    	change: function(t, newValue, oldValue, eops){
	    		unitComboStore.getProxy().extraParams = {
	    			building_id: newValue
	    		}
	    		unitComboStore.load();
	    	}
	    }
	});

	var unitCombo = Ext.create('Ext.form.ComboBox', {
	    fieldLabel: 'Unit',
	    store: unitComboStore,
	    queryMode: 'local',
	    displayField: 'unit_name',
	    name: 'unit_id',
	    valueField: 'id',
	    allowBlank: false,
	});

	var gridtbar = role == 2 ? [
		  { xtype: 'button', text: 'Add',
			  handler: function() {
			  	onAdd = true;
			  	var form = Ext.getCmp('buildingForm').getForm();
			  	form.reset();
			  	Ext.getCmp('building_window').setTitle('Add Visit');
		  		Ext.getCmp('building_window').show();
			  }
		  },
		  { xtype: 'button', text: 'Edit',
			  	handler: function() {
			  		onAdd = false;
			  		var form = Ext.getCmp('buildingForm').getForm();
			  		var selection = grid.selModel.getSelection();
					if(selection.length > 0) {
						Ext.getCmp('buildingForm').loadRecord(selection[0]);
					}else {
						Ext.Msg.alert('Failed', 'Please select the record');
						return;
					}
			  		Ext.getCmp('building_window').setTitle('Update Visit');
			  		Ext.getCmp('building_window').show();
			   	}
		  },
		  { xtype: 'button', text: 'Delete',
			    handler: function() {
			    	var selection = grid.selModel.getSelection();
					if(selection.length > 0) {
						Ext.Ajax.request({
						    url: 'visitDelete',
						    method: 'POST',
						    params: {
						        id: selection[0].getData().id
						    },
						    success: function(response){
						        var res = JSON.parse(response.responseText);
						        if(res.success) {
						        	Ext.Msg.alert('Success', res.message);	
		                			archivedStore.load();
						        }else {
						        	Ext.Msg.alert('Failed', res.message);
						        }
						    }
						});
					}else {
						Ext.Msg.alert('Failed', 'Please select the record');
						return;
					}
			    }
		  },
		  
		  '->',
		  {
		  	xtype: 'textfield',
			listeners: {
			  	change: function(t, newValue, oldValue, eopts){
			  		searchBuilding(newValue);
			  	}
			}
		  },
		] : [
		  '->',
		  {
		  	xtype: 'textfield',
			listeners: {
			  	change: function(t, newValue, oldValue, eopts){
			  		searchBuilding(newValue);
			  	}
			}
		  },
		];

	var grid = Ext.create('Ext.grid.Panel', {
		title: 'Visit Entry List',
	    store: archivedStore,
	    flex: 3,
	    tbar: gridtbar,
	    columns: [
	        { text: 'Building Name',  dataIndex: 'building_name', flex: 1 },
	        { text: 'Unit Name', dataIndex: 'unit_name', flex: 1},
	        { text: 'Mobile Number', dataIndex: 'mobile', flex: 1},
	        { text: 'Name', dataIndex: 'name', flex: 1},
	        { text: 'Date', dataIndex: 'visit_date', flex: 1},
	        { text: 'Time', dataIndex: 'visit_time', flex: 1},
	        { text: 'Purpose', dataIndex: 'purpose', flex: 1},
	        { text: 'Company', dataIndex: 'company', flex: 1},
	        { text: 'EID', dataIndex: 'eid', flex: 1},
	        // { text: 'Emirate', dataIndex: 'emirates_id', flex: 1, renderer: function(val) {
	        // 	if(val != '') {
	        // 		return `<a href="${base_url}/${val}" target="_blank"><i class="fas fa-eye"></i></a>`;
	        // 	}
	        // }},
	    ],
	    dockedItems: [{
	        xtype: 'pagingtoolbar',
	        store: archivedStore,   // same store GridPanel is using
	        dock: 'bottom',
	        displayInfo: true
	    }],
	    height: height,
	    listeners: {
	    	itemdblclick: function(t, record, item, index, e, eops) {
	    		onAdd = false;
	    		if(role == 1) {
	    			Ext.getCmp('submit').hide();
	    		}
		  		var form = Ext.getCmp('buildingForm').getForm();
		  		Ext.getCmp('buildingForm').loadRecord(record);
		  		Ext.getCmp('building_window').setTitle('Update Visit');
		  		Ext.getCmp('building_window').show();
	    	}
	    }
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
		    buildingCombo,
		    unitCombo,
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'Mobile Number',
		        name: 'mobile',
		        allowBlank: false
		    },
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'Name',
		        id: 'name',
		        name: 'name',
		        allowBlank: false
		    },
		    {
		    	xtype: 'datefield',
		        fieldLabel: 'Date',
		        name: 'visit_date',
		        value: new Date(),
		        format: 'Y-m-d',
		        allowBlank: false
		    },
		    {
		    	xtype: 'timefield',
		        fieldLabel: 'Time',
		        name: 'visit_time',
		        increment: 30,
		        value: Ext.util.Format.date(new Date(), 'g:i A'),
		        allowBlank: false
		    },
		    {
		    	xtype     : 'textareafield',
		        name      : 'purpose',
		        fieldLabel: 'Purpose',
		        allowBlank: false
		    },
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'Company',
		        name: 'company',
		        allowBlank: false
		    },
		    {
		    	xtype: 'textfield',
		        fieldLabel: 'EID Number',
		        name: 'eid',
		        allowBlank: false
		    },
		    // {
		    // 	xtype: 'filefield',
		    //     name: 'file',
		    //     fieldLabel: 'File',
		    //     labelWidth: 50,
		    //     msgTarget: 'side',
		    //     anchor: '100%',
		    //     buttonText: 'Select File...'
		    // },
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
			url = "visitAdd";
		} else {
			url = "visitUpdate";
		}
		
        if (form.isValid()) {
            form.submit({
            	method: 'POST',
            	url: url,
                success: function(form, action) {
                	if(action.result.success) {
                		Ext.Msg.alert('Success', action.result.message);	
                		Ext.getCmp('building_window').hide();
                		archivedStore.load();
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

	var window = Ext.create('Ext.window.Window', {
		title: 'Add',
		id: 'building_window',
		width: 600,
		height: 500,
		layout: 'fit',
		closeAction: 'hide',
		items: [buildingForm],
	});

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

