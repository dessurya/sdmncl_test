@extends('admin-page.__layout.basic')

@section('title')
{{ $config['title'] }}
@endsection

@section('css')
@endsection

@section('js')
<script type="text/javascript">
	var urlActn = "{!! route($config['routeAct']) !!}";
	$( document ).ready(function() {
		var confDtTable = {};
		confDtTable['dataTabOfId'] = '#table-data';
		confDtTable['reBuild'] = false;
		confDtTable['ajaxUrl'] = '{!! route("adminPage.callData", ["model"=>$config["model"]]) !!}';
		confDtTable['fieldSort'] = '{!! $config["tabContentSort"] !!}';
		confDtTable['ConfigColumns'] = {!! json_encode($config["tabContent"]) !!};
		confDtTable['dataPost'] = {};
		sessionStorage.setItem("confDtTable", JSON.stringify(confDtTable));
		callDataTabless(confDtTable);
	});

	$(document).on('click', 'table#table-data tbody tr', function(){
		$(this).toggleClass('selected');
	});

	$(document).on('click', '#actionButton button', function(){
		var data = {
			"action" : $(this).data('action'),
			"select" : $(this).data('select'),
			"confirm" : $(this).data('confirm'),
			"multiple" : $(this).data('multiple'),
			"target" : "#contentOfData #table-data tr.selected"
		};
		actionButtonExe(data);
	});

	function actionButtonExe(data) {
		var id = true;
		if (data.select == true) {
			id = getSelectedRowId({"target" : data.target, "multiple" : data.multiple});
			if (id === false) { return false; }
		}
		data["id"] = id;
		if (data.confirm == true) {
			pnotifyConfirm({
				"title" : "Warning",
				"type" : "info",
				"text" : "Are You Sure Do "+data.action+" On Selected Data?",
				"data" : data,
				"url" : urlActn
			});
		}else{
			postData(data,urlActn);
		}
	}

	function getSelectedRowId(data) {
		var idData = "";
		$(data.target).each(function(){
			idData += $(this).attr('id')+'^';
		});
		var idDL = idData.length-1;
		idData = idData.substr(0, idDL);
		if (idData === null || idData === '' || idData === undefined) { 
			pnotify({"title":"info","type":"error","text":"No Data Selected!"}); 
			return false;
		}else if(data.multiple == false && idData.indexOf('^') > -1){
			pnotify({"title":"info","type":"error","text":"You only can selected one data!"}); 
			return false;
		}
		return idData;
	}

	function callDataTabless(setConf) {
		if(setConf.reBuild == true){
			datatable.destroy();
		}

		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
			return {
				"iStart": oSettings._iDisplayStart,
				"iEnd": oSettings.fnDisplayEnd(),
				"iLength": oSettings._iDisplayLength,
				"iTotal": oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
				"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
			};
		};

		var dataTabOfId = setConf.dataTabOfId;
		datatable = $(dataTabOfId).DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: setConf.ajaxUrl,
				type: "POST",
				data: setConf.dataPost
			},
			aDataSort: [ [setConf.fieldSort, 'asc'] ],
			columns: setConf.ConfigColumns,
			initComplete: function () {
				var api = this.api();
				api.columns().every(function () {
					var column = this;
					if ($(column.footer()).hasClass('search')) {
						var input = $('<input type="text" class="search form-control input-sm" placeholder="Search '+$(column.footer()).text()+'" />');
						input.appendTo( $(column.footer()).empty() ).on('change', function (keypress) {
							if (column.search() !== this.value) {
			                        // var val = $.fn.dataTable.util.escapeRegex($(this).val());
			                        var val = this.value;
			                        column.search(val ? val : '', true, false).draw();
			                    }
			                });
					}
				});
			},
			rowCallback: function(row, data, iDisplayIndex) {
				$(row).attr('id', data.id);
			}
		});
	}

	function reloadDataTabless() {
		var confDtTable =JSON.parse(sessionStorage.getItem("confDtTable"));
		confDtTable['reBuild'] = true;
		if($(confDtTable['dataTabOfId']).length){
			callDataTabless(confDtTable);
		}
	}

	$(document).on('submit', 'form.storeForm', function(){
		var input = new FormData($(this)[0]);
		pnotifyConfirm({
			"title" : "Warning",
			"type" : "info",
			"text" : "Are You Sure Do Store This Data?",
			"formData" : true,
			"data" : new FormData($(this)[0]),
			"url" : urlActn
		});
		return false;
	});
</script>
@endsection

@section('content')
@livewire('admin-page.action-button', ['button' => $config['actionButton']])
@livewire('admin-page.index-of-data', ['config' => $config])
@endsection