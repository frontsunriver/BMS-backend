var height = window.innerHeight - 100;
Ext.onReady(function () {
	var onAdd = false;
	Ext.define('UserModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'first_name',  type: 'string'},
	         {name: 'last_name',       type: 'string'},
	         {name: 'email',       type: 'string'},
	         {name: 'mobile',       type: 'string'},
	         {name: 'type',       type: 'string'},
	     ]
	 });

	Ext.define('UnitModel', {
	     extend: 'Ext.data.Model',
	     fields: [
	         {name: 'id', type: 'string'},
	         {name: 'unit_name',  type: 'string'},
	         {name: 'building_id',  type: 'string'},
	         {name: 'building_name',  type: 'string'},
	         {name: 'unit_id',  type: 'string'},
	         {name: 'user_id',  type: 'string'},
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

	var userStore = Ext.create('Ext.data.Store', {
		 model: 'UserModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getUserList',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     }
		 },
		 autoLoad: true,
 		 listeners: {
		 	beforeload: function(store, op, eop){
		 		store.getProxy().setExtraParam('type', 1);
		 	}
		 }
	});

	var unitStore = Ext.create('Ext.data.Store', {
		 model: 'UnitModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getOwnerList',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     }
		 },
		 autoLoad: false,

	});

	var buildingComboStore = Ext.create('Ext.data.Store', {
		 model: 'BuildingComboModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getBuildingList',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     }
		 },
		 autoLoad: false	
	});

	var unitComboStore = Ext.create('Ext.data.Store', {
		 model: 'UnitComboModel',
		 proxy: {
		     type: 'ajax',
		     url: 'getUnitList',
		     reader: {
		        type: 'json',
		        root: 'data',
		        totalProperty: 'total'
		     }
		 },
		 autoLoad: false	
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

	var grid = Ext.create('Ext.grid.Panel', {
		title: 'Owner List',
	    store: userStore,
	    flex: 3,
	    tbar: [
		  { xtype: 'button', text: 'Import',
		  		handler: function() {
		  			buildingUploadWindow.show();
		  		}
		  },
		  { xtype: 'button', text: 'Add',
			  handler: function() {
			  	onAdd = true;
			  	var form = Ext.getCmp('buildingForm').getForm();
			  	form.reset();
			  	Ext.getCmp('email').setDisabled(false);
			  	Ext.getCmp('building_window').setTitle('Add Building');
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
					Ext.getCmp('email').setDisabled(true);
			  		Ext.getCmp('building_window').setTitle('Update Building');
			  		Ext.getCmp('building_window').show();
			   	}
		  },
		  { xtype: 'button', text: 'Delete',
			    handler: function() {
			    	var selection = grid.selModel.getSelection();
					if(selection.length > 0) {
						Ext.Ajax.request({
						    url: 'userDelete',
						    method: 'POST',
						    params: {
						        id: selection[0].getData().id
						    },
						    success: function(response){
						        var res = JSON.parse(response.responseText);
						        if(res.success) {
						        	Ext.Msg.alert('Success', res.message);	
		                			userStore.load();
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
		  '-',
		  {
		  	xtype: 'button', text: 'Reset Password',
		    handler: function() {
		    	var selection = grid.selModel.getSelection();
				if(selection.length > 0) {
					Ext.Ajax.request({
					    url: 'userResetPassword',
					    method: 'POST',
					    params: {
					        id: selection[0].getData().id
					    },
					    success: function(response){
					        var res = JSON.parse(response.responseText);
					        if(res.success) {
					        	Ext.Msg.alert('Success', res.message);	
	                			userStore.load();
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
		],
	    columns: [
	        { text: 'First Name',  dataIndex: 'first_name', flex: 1 },
	        { text: 'Last Name', dataIndex: 'last_name', flex: 1},
	        { text: 'Email', dataIndex: 'email', flex: 1},
	        { text: 'Mobile', dataIndex: 'mobile', flex: 1},
	    ],
	    dockedItems: [{
	        xtype: 'pagingtoolbar',
	        store: userStore,   // same store GridPanel is using
	        dock: 'bottom',
	        displayInfo: true
	    }],
	    height: height,
	    listeners: {
	    	itemClick: function(t, record, item, index, e, eops){
	    		unitStore.getProxy().extraParams = {'user_id': record.data.id};
	    		unitStore.load();
	    	},
	    	itemdblclick: function(t, record, item, index, e, eops) {
	    		onAdd = false;
		  		var form = Ext.getCmp('buildingForm').getForm();
		  		Ext.getCmp('buildingForm').loadRecord(record);
		  		Ext.getCmp('email').setDisabled(true);
		  		Ext.getCmp('building_window').setTitle('Update Building');
		  		Ext.getCmp('building_window').show();
	    	}
	    }
	});

	var unitGrid = Ext.create('Ext.grid.Panel', {
		title: 'Unit List',
	    store: unitStore,
	    flex: 2,
	    tbar: [
		  // { xtype: 'button', text: 'Import',
		  // 		handler: function() {
		  // 			var selection = grid.selModel.getSelection();
				// 	if(selection.length > 0) {
				// 		Ext.getCmp('building_upload_id').setValue(selection[0].getData().id);
				// 	}else {
				// 		Ext.Msg.alert('Failed', 'Please select the building');
				// 		return;
				// 	}
		  // 			unitUploadWindow.show();
		  // 		}
		  // },
		  { xtype: 'button', text: 'Add',
			  handler: function() {
			  	var selection = grid.selModel.getSelection();
				if(selection.length > 0) {
					onAdd = true;
				  	var form = Ext.getCmp('unitForm').getForm();
				  	form.reset();
				  	Ext.getCmp('user_id').setValue(selection[0].getData().id);
				  	Ext.getCmp('unit_window').setTitle('Add Unit');
			  		Ext.getCmp('unit_window').show();
				}else {
					Ext.Msg.alert('Failed', 'Please select the building');
					return;
				}
			  }
		  },
		  { xtype: 'button', text: 'Edit',
			  	handler: function() {
			  		onAdd = false;
			  		var form = Ext.getCmp('unitForm').getForm();
			  		var selection = unitGrid.selModel.getSelection();
					if(selection.length > 0) {
						Ext.getCmp('unitForm').loadRecord(selection[0]);
					}else {
						Ext.Msg.alert('Failed', 'Please select the record');
						return;
					}
			  		Ext.getCmp('unit_window').setTitle('Update Unit');
			  		Ext.getCmp('unit_window').show();
			   	}
		  },
		  { xtype: 'button', text: 'Delete',
			    handler: function() {
			    	var selection = unitGrid.selModel.getSelection();
					if(selection.length > 0) {
						Ext.Ajax.request({
						    url: 'userOwnerDelete',
						    method: 'POST',
						    params: {
						        id: selection[0].getData().id
						    },
						    success: function(response){
						        var res = JSON.parse(response.responseText);
						        if(res.success) {
						        	Ext.Msg.alert('Success', res.message);	
		                			unitStore.load();
		                			userStore.load();
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
			  		searchUnit(newValue);
			  	}
			}
		  },
		],
	    columns: [
	        { text: 'Building Name',  dataIndex: 'building_name', flex: 1, align: 'center' },
	        { text: 'Unit Name',  dataIndex: 'unit_name', flex: 1, align: 'center' },
	    ],
	    dockedItems: [{
	        xtype: 'pagingtoolbar',
	        store: unitStore,   // same store GridPanel is using
	        dock: 'bottom',
	        displayInfo: true
	    }],
	    height: height,
	    listeners: {
	    	itemdblclick: function(t, record, item, index, e, eops) {
	    		onAdd = false;
		  		var form = Ext.getCmp('unitForm').getForm();
		  		Ext.getCmp('unitForm').loadRecord(record);
		  		Ext.getCmp('unit_window').setTitle('Update Unit');
		  		Ext.getCmp('unit_window').show();
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

	var unitForm = Ext.create('Ext.form.Panel', {
		id: 'unitForm',
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
		    	xtype: 'hiddenfield',
		    	name: 'id'
		    },
		    {	
		    	xtype: 'hiddenfield',
		    	name: 'user_id',
		    	id: 'user_id'
		    }
	    ],
	    buttons: [
	    {
	        text: 'Submit',
	        formBind: true, //only enabled once the form is valid
	        disabled: true,
	        handler: function() {
	            unitAction();
	        }
	    },
	    {
	        text: 'Close',
	        handler: function() {
	            Ext.getCmp('unit_window').hide();
	        }
	    }],
	});

	var buildingUploadForm = Ext.create('Ext.form.Panel', {
	    width: 400,
	    bodyPadding: 20,
	    items: [{
	        xtype: 'filefield',
	        name: 'file',
	        fieldLabel: 'File',
	        labelWidth: 50,
	        msgTarget: 'side',
	        allowBlank: false,
	        anchor: '100%',
	        buttonText: 'Select Excel File...'
	    },{
	    	xtype: 'hiddenfield',
	    	name: 'type',
	    	value: '1'
	    }],
	    buttons: [{
	        text: 'Upload',
	        handler: function() {
	            var form = this.up('form').getForm();
	            if(form.isValid()){
	                form.submit({
	                    url: 'importUserFile',
	                    waitMsg: 'Uploading your File...',
	                    success: function(fp, o) {
	                    	console.log(o);
	                    	var res = JSON.parse(o.response.responseText);
	                    	if(res.success) {
	                    		Ext.Msg.alert('Success', res.message);
	                    		Ext.getCmp('building_upload_window').hide();
	                    		userStore.load();
	                    	}else {
	                    		Ext.Msg.alert('Failed', res.message);
	                    	}
	                        // Ext.Msg.alert('Success', 'Your photo "' + o.result.file + '" has been uploaded.');
	                    }
	                });
	            }
	        }
	    }]
	});

	var unitUploadForm = Ext.create('Ext.form.Panel', {
	    width: 400,
	    bodyPadding: 20,
	    items: [{
	        xtype: 'filefield',
	        name: 'file',
	        fieldLabel: 'File',
	        labelWidth: 50,
	        msgTarget: 'side',
	        allowBlank: false,
	        anchor: '100%',
	        buttonText: 'Select Excel File...'
	    },{
	    	xtype: 'hiddenfield',
	    	name: 'building_id',
	    	id: 'building_upload_id'
	    }],
	    buttons: [{
	        text: 'Upload',
	        handler: function() {
	            var form = this.up('form').getForm();
	            if(form.isValid()){
	                form.submit({
	                    url: 'setting/importUnitFile',
	                    waitMsg: 'Uploading your photo...',
	                    success: function(fp, o) {
	                    	console.log(o);
	                    	var res = JSON.parse(o.response.responseText);
	                    	if(res.success) {
	                    		Ext.Msg.alert('Success', res.message);
	                    		Ext.getCmp('unit_upload_window').hide();
	                    		unitStore.load();
	                    		userStore.load();
	                    	}else {
	                    		Ext.Msg.alert('Failed', res.message);
	                    	}
	                        // Ext.Msg.alert('Success', 'Your photo "' + o.result.file + '" has been uploaded.');
	                    }
	                });
	            }
	        }
	    }]
	});

	var window = Ext.create('Ext.window.Window', {
		title: 'Add',
		id: 'building_window',
		width: 500,
		height: 300,
		layout: 'fit',
		closeAction: 'hide',
		items: [buildingForm],
	});

	var unitWindow = Ext.create('Ext.window.Window', {
		title: 'Add',
		id: 'unit_window',
		width: 500,
		height: 300,
		layout: 'fit',
		closeAction: 'hide',
		items: [unitForm],
	});

	var buildingUploadWindow = Ext.create('Ext.window.Window', {
		title: 'Import File',
		id: 'building_upload_window',
		width: 400,
		height: 150,
		layout: 'fit',
		closeAction: 'hide',
		items: [buildingUploadForm],
	});

	var unitUploadWindow = Ext.create('Ext.window.Window', {
		title: 'Import File',
		id: 'unit_upload_window',
		width: 400,
		height: 150,
		layout: 'fit',
		closeAction: 'hide',
		items: [unitUploadForm],
	});

	function searchBuilding(text) {
		userStore.getProxy().extraParams = {
			query: text
		};
		userStore.load();
	}

	function searchUnit(text) {
		var selection = grid.selModel.getSelection();
		if(selection.length > 0) {
			unitStore.getProxy().extraParams = {
				query: text,
				user_id: selection[0].getData().id
			};
			unitStore.load();	
		}
		
	}

	function buildingAction() {
		var url = "";
		var form = Ext.getCmp('buildingForm').getForm();
		if(onAdd) {
			url = "userAdd";
		} else {
			url = "userUpdate";
		}
		
        if (form.isValid()) {
            form.submit({
            	method: 'POST',
            	url: url,
            	
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

	function unitAction() {
		var url = "";
		var form = Ext.getCmp('unitForm').getForm();
		if(onAdd) {
			url = "userOwnerAdd";
		} else {
			url = "userOwnerUpdate";
		}
		
        if (form.isValid()) {
            form.submit({
            	method: 'POST',
            	url: url,
                success: function(form, action) {
                	if(action.result.success) {
                		Ext.Msg.alert('Success', action.result.message);	
                		Ext.getCmp('unit_window').hide();
                		unitStore.load();
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
	    items: [grid, {xtype:'splitter'}, unitGrid],
	    renderTo: 'javascriptrender'
	});
});

