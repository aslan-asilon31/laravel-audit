@section('title', __('Prices'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="bi-house-check-fill text-info"></i>
							Price Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Prices">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#DataModal">
						<i class="bi-plus-lg"></i>  Add Prices
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.prices.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Price</th>
								<th>Features</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($prices as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->price }}</td>
								<td>{{ $row->features }}</td>
								<td width="90">
									<div class="dropdown">
											<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
												Actions
											</button>
											<ul class="dropdown-menu">
												<li>
													<a class="dropdown-item"
													data-bs-toggle="modal"
													data-bs-target="#DataModal"
													wire:click="edit('{{ $row->id }}')">
													<i class="bi-pencil-square"></i> Edit
													</a>
												</li>
												<li>
													<a class="dropdown-item"
													onclick="confirm('Confirm Delete Price id {{ $row->id }}? \nDeleted Prices cannot be recovered!') || event.stopImmediatePropagation()"
													wire:click="destroy({{ $row->id }})">
													<i class="bi-trash3-fill"></i> Delete
													</a>
												</li>
											</ul>
									</div>
								</td>

							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $prices->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>