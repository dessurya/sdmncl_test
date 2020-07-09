<div id="contentOfData">
	<div class="accordion" id="accordionExample">
		<div class="card">
			<div class="card-header" id="headingTwo">
				<h2 class="mb-0">
					<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						Form Data Of {{ $config['title'] }}
					</button>
				</h2>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				<div class="card-body">
					@livewire('admin-page.'.$config['form'])
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header" id="headingOne">
				<h2 class="mb-0">
					<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Index Of {{ $config['title'] }}
					</button>
				</h2>
			</div>
			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
					<div class="table-responsive">
						<table id="table-data" class="table table-striped table-bordered no-footer" width="100%">
							<thead>
								<tr role="row">
									@foreach($config['tabContent'] as $list)
									<th>{{ Str::title($list['name']) }}</th>
									@endforeach
								</tr>
							</thead>
							<tfoot class="">
								<tr role="row">
									@foreach($config['tabContent'] as $list)
									@if($list['searchable'] == 'true')
									<th class="search">{{ Str::title($list['name']) }}</th>
									@else
									<th></th>
									@endif
									@endforeach
								</tr>
							</tfoot>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
