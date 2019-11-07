@extends('layouts.master')
@section('content')

<section class="col-md-12">
	<h4>Add New Buyer Bank Information</h4>
</section>
<div> . </div>	

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
			<div class="box box-primary">

				@if ($errors->any())
					<div class="alart alart-danger">
						<strong>Whoops! </strong> there are some problems in your input... <br>
						<ul>
							@foreach ($errors as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form id="shipper_frm" action="{{route('buyerBank.store')}}" method="post" enctype="multipart/form-data">
					<div class="box-body">
						@csrf

						<div class="form-group">
							<h5 class="box-title">Basic Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Name <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="name"  class="validate[required] form-control" id="name" value=""  autofocus/>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Branch Address <i style="color:red;font-size:15px;">*</i> </label>
							<textarea name="branch_add" spellcheck="false" rows="4"  class="validate[required] form-control" id="branch_add" ></textarea>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Swift Code <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" name="swift_code"  class="form-control" id="swift_code" value=""  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Other Information </label>
							<input type="text" spellcheck="false" name="other_info"  class=" form-control" id="other_info" value=""  autofocus/>
						</div>	
						
					</div>
							<input type="hidden" name="myaction" id="myaction" value="add" />
							<input type="hidden" name="mid" id="mid" value="0" />
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('buyerBank.index')}}" class="btn btn-success">Cancel</a>
						</div>
				</form>
			</div>
		</div>
	</div>		
</section>

@endsection