<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Admin Page - @yield('title')</title>
		<link href="{{ asset('asset/bootstrap-4.5.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('asset/pnotify/pnotify.custom.min.css') }}">
		<link rel="stylesheet" href="{{ asset('asset/DataTables/datatables.min.css') }}">
		<style type="text/css">
			body{
				background-color: rgb(160,160,160);
			}
			#oneOfTheBox{
				position: relative; width: 95%; margin: 30px auto; padding: 20px; background-color: white; 
				border-radius: 5px;
			}
			table#table-data tr{
				cursor: pointer;
			}

			table#table-data tbody tr.selected{
				background-color: #aab7d1;
			}
		</style>
		@yield('css')
	</head>
	<body>
		<div id="oneOfTheBox">
			<left><h3>Content Management Sistem Area</h3></left>
			<hr>
			@livewire('admin-page.navigasi')
			@yield('content')
		</div>
		<script type="text/javascript" src="{{ asset('asset/jquery/dist/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('asset/bootstrap-4.5.0-dist/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('asset/pnotify/pnotify.custom.min.js') }}"></script>
		
		<script type="text/javascript" src="{{ asset('asset/DataTables/datatables.min.js') }}"></script>
		<script type="text/javascript">
			var datatable;
			$(document).on('click', '#navigasi ul.nav li a', function(){
				var url = $(this).attr('href');
				location.replace(url);
			});
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
			function postData(data,url) {
				$.ajax({
					url: url,
					type: 'post',
					dataType: 'json',
					data: data,
					beforeSend: function() {
						$('#loading-page').show();
					},
					success: function(data) {
						responsePostData(data);
						$('#loading-page').hide();
					}
				});
			}

			function postFormData(data,url) {
				$.ajax({
					url: url,
					processData:false,
					contentType:false,
					type: 'post',
					dataType: 'json',
					data: data,
					beforeSend: function() {
						$('#loading-page').show();
					},
					success: function(data) {
						responsePostData(data);
						$('#loading-page').hide();
					}
				});
			}

			function responsePostData(data) {
				if (data.formPrepare == true) { formPrepare(data); }
				if (data.reloadDataTabless == true) { reloadDataTabless(); }
				if (data.pnotify == true) { pnotify({"title":"Warning","type":"error","text":data.msg}); }
			}

			function formPrepare(data) {
				$(data.target).find('button').removeAttr('disabled');
				$(data.target).find('input').removeAttr('readonly');
				$(data.target).find('textarea').removeAttr('readonly');
				$(data.target).find('select').removeAttr('readonly');
				
				$.each(data.required, function(key,target){
					$('[name='+target+']').attr('required', 'true');
				});
				$.each(data.readonly, function(key,target){
					$('[name='+target+']').attr('readonly', 'true');
				});

				if (data.data == null) {
					$(data.target).find('input').val('');
					$(data.target).find('textarea').val('');
					$('picture').hide();
					$('picture img').attr('src', '');
					$(data.target).find('input[name=action]').val('store');
				}else{
					$.each(data.data, function(key, val){
						if (key != 'picture') {
							$(data.target+' [name='+key+']').val(val);
						}else if (key == 'picture' && (val != null && val != "" && val != undefined && val.length > 0)) {
							$('picture').show();
							$('picture img').attr('src', '{!! asset('') !!}'+val);
						}
					});
				}

				$('#collapseTwo').collapse('show');
			}

			function pnotify(data) {
				new PNotify({
					title: data.title,
					text: data.text,
					type: data.type,
					delay: 3000
				});
			}

			function pnotifyConfirm(data) {
				new PNotify({
					after_open: function(ui){
						$(".true", ui.container).focus();
						$('#loading-page').show();
					},
					after_close: function(){
						$('#loading-page').hide();
					},
					title: data.title,
					text: data.text,
					type: data.type,
					delay: 3000,
					confirm: {
						confirm: true,
						buttons:[
						{ text: 'Yes', addClass: 'true btn-primary', removeClass: 'btn-default'},
						{ text: 'No', addClass: 'false'}
						]
					}
				}).get().on('pnotify.confirm', function(){
					if (data.formData == true) {
						postFormData(data.data,data.url);
					}else{
						postData(data.data,data.url);
					}
				});
			}
		</script>
		@yield('js')
	</body>
</html>