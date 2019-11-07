@extends('layouts.master')
@section('content')

<section class="col-md-12">
	<h4>Add New Buyer Information</h4>
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

				<form id="shipper_frm" action="{{route('buyer.store')}}" method="post" enctype="multipart/form-data">
					<div class="box-body">
						@csrf

						<div class="form-group">
							<h5 class="box-title">Basic Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Busniess Name <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="business_name"  class="validate[required] form-control" id="business_name" value=""  autofocus/>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Office Address <i style="color:red;font-size:15px;">*</i> </label>
							<textarea name="office_add" spellcheck="false" rows="4"  class="validate[required] form-control" id="office_add" ></textarea>
						</div>	

						<div class="form-group">
							<label for="exampleInputEmail1">Factory Address</label>
							<textarea name="factory_add" spellcheck="false" rows="4"  class=" form-control" id="factory_add" ></textarea>
						</div>

						<div class="form-group">
							<h5 class="box-title">Contact Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Shipper E-mail </label>
							<input type="email" spellcheck="false" name="email" id="email" class="form-control" value="" />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">FAX No. </label>
							<input type="text" spellcheck="false" name="fax_no" id="fax_no" class="form-control" value="" />
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Phone Number </label>
							<input type="text" name="phone_no"  class="form-control" id="phone_no" value=""  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Contact Person </label>
							<input type="text" spellcheck="false" name="contact_person"  class=" form-control" id="contact_person" value=""  autofocus/>
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Buyer Banks </label>
							<select name="buyerBank_id" id="buyerBank"  class="validate[required] form-control search_test" >
									<option id="none" value="">-- Select Banks --</option>
									
										<option>jdk</option>
										<option>jdk</option>
										<option>jdk</option>
									
							</select>
						</div>		
						
					</div>
							<input type="hidden" name="myaction" id="myaction" value="add" />
							<input type="hidden" name="mid" id="mid" value="0" />
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('buyer.index')}}" class="btn btn-success">Cancel</a>
						</div>
				</form>
			</div>
		</div>
	</div>		
</section>

@endsection