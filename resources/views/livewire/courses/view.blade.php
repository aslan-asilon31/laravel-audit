@section('title', __('Courses'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="bi-house-check-fill text-info"></i>
							Course Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Courses">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#DataModal">
						<i class="bi-plus-lg"></i>  Add Courses
						</div>
					</div>
				</div>
				
				<div class="card-body">
					<!-- Modal -->
					<div wire:ignore.self class="modal fade" id="DataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="DataModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="DataModalLabel">{{ $selected_id ? 'Update Course' : 'Create Course' }}</h5>
									<button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
							<div class="modal-body">
									<form>
									@if ($selected_id)
										<input type="hidden" wire:model="selected_id">
									@endif
										<div class="form-group">
											<label for="role_id"></label>
											<input wire:model.live="role_id" type="text" class="form-control" id="role_id" placeholder="Role Id">@error('role_id') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-group">
											<label for="price_id"></label>
											<input wire:model.live="price_id" type="text" class="form-control" id="price_id" placeholder="Price Id">@error('price_id') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-group">
											<label for="title"></label>
											<input wire:model.live="title" type="text" class="form-control" id="title" placeholder="Title">@error('title') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-group">
											<label for="description"></label>
											<input wire:model.live="description" type="text" class="form-control" id="description" placeholder="Description">@error('description') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>

									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
									<button type="button" wire:click.prevent="save()" class="btn btn-primary">{{ $selected_id ? 'Update' : 'Create' }}</button>
								</div>
							</div>
						</div>
					</div>
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Role Id</th>
								<th>Price Id</th>
								<th>Title</th>
								<th>Description</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($courses as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->role_id }}</td>
								<td>{{ $row->price_id }}</td>
								<td>{{ $row->title }}</td>
								<td>{{ $row->description }}</td>
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
					<div class="float-end">{{ $courses->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>