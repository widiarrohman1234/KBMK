@extends('template.base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Data Kata
					<a href="{{url('admin/kata/create')}}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah</a>
				</div>
				<div class="card-body">
					<table class="table table-datatable">
						<thead>
							<th>No</th>
							<th>Aksi</th>
							<th>Nama Kata</th>
						</thead>
						<tbody>
							@foreach($list_kata as $kata)
						 <tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
								<a href="{{url('admin/kata', $kata->id)}}" class="btn btn-dark float-right"><i class="fa fa-info"></i></a>
								<a href="{{url('admin/kata', $kata->id)}}/edit" class="btn btn-warning float-right"><i class="fa fa-edit"></i></a>
								@include('template.utils.delete', ['url' => url('admin/kata', $kata->id)])
								</div>
							</td>
							<td>{{$kata->nama_kata}}</td>
						 </tr>
						 	@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection