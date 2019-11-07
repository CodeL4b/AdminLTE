@extends('layouts.master')
@section('content')


<div class="animated fadeIn">
    <div class="row">
    	
    	<div class="card-body">
			<a class="btn btn-outline-success" href="{{ route('buyerBank.create')}}"> Create New</a>
		</div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Branch Address</th>
                                <th>Swift Code</th>
                                <th>Generated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($buyerBanks as $buyerBank)
                            <tr>
                                <td>{{$buyerBank->name}}</td>
                                <td>{{$buyerBank->branch_add}}</td>
                                <td>{{$buyerBank->swift_code}}</td>
                                <td>{{$buyerBank->created_at}}</td>
                                <td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary btn-sm">Action</button>
										<button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<form action="{{ route ('buyerBank.destroy', $buyerBank->id) }}" method="post">
											<a class="btn btn-sm btn-warning" href="{{route ('buyerBank.edit', $buyerBank->id)}}" style="width: 90px;margin: 5px;"><i class="fa fa-edit"></i> Edit</a><br>
											@csrf
											@method('DELETE')
											<button class="btn btn-sm btn-danger" href="{{route ('buyerBank.destroy', $buyerBank->id)}}" style="width: 90px;margin: 5px;" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
											</form>
										</ul>
									</div>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
@endsection