@extends('layouts.master')
@section('content')

<section class="col-md-12">
	<h4>Update CNF Information</h4>
</section>
<div> . </div>	

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
			<div class="box box-primary">

				<form id="shipper_frm" action="{{route('cnf.update', $cnf->id)}}" method="post" enctype="multipart/form-data">
					<div class="box-body">
						@csrf
						@method('PUT')

						<div class="form-group">
							<h5 class="box-title">Basic Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Name <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="name"  class="validate[required] form-control" id="name" value="{{$cnf->name}}"  autofocus/>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Address <i style="color:red;font-size:15px;">*</i> </label>
							<textarea name="address" spellcheck="false" rows="4"  class="validate[required] form-control" id="address" ></textarea>
						</div>	

						<div class="form-group">
							<label for="exampleInputEmail1">Port Address</label>
							<textarea name="working_port" spellcheck="false" rows="4"  class=" form-control" id="working_port" ></textarea>
						</div>

						<div class="form-group">
							<h5 class="box-title">Contact Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">E-mail </label>
							<input type="email" spellcheck="false" name="email" id="email" class="form-control" value="{{$cnf->email}}" />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Mobile Number </label>
							<input type="text" spellcheck="false" name="mobile" id="mobile" class="form-control" value="{{$cnf->mobile}}" />
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Phone Number </label>
							<input type="text" name="phone"  class="form-control" id="phone" value="{{$cnf->phone}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Contact Person </label>
							<input type="text" spellcheck="false" name="contact_person"  class=" form-control" id="contact_person" value="{{$cnf->contact_person}}"  autofocus/>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Registration Number </label>
							<input type="text" name="reg_no"  class="form-control" id="reg_no" value="{{$cnf->reg_no}}"  />
						</div>		
						
					</div>
							<input type="hidden" name="myaction" id="myaction" value="add" />
							<input type="hidden" name="mid" id="mid" value="0" />
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('cnf.index')}}" class="btn btn-success">Cancel</a>
						</div>
				</form>
			</div>
		</div>
	</div>		
</section>

@endsection