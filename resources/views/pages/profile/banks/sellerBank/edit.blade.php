@extends('layouts.master')
@section('content')

<section class="col-md-12">
	<h4>Add New Seller Bank Information</h4>
</section>
<div> . </div>	

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
			<div class="box box-primary">

				<form id="shipper_frm" action="{{route('sellerBank.update', $sellerBank->id)}}" method="post" enctype="multipart/form-data">
					<div class="box-body">
						@csrf
						@method('PUT')

						<div class="form-group">
							<h5 class="box-title">Basic Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1"> Account Name <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="acc_name"  class="validate[required] form-control" id="acc_name" value="{{$sellerBank->acc_name}}"  autofocus/>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1"> Account Number <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="acc_num"  class="validate[required] form-control" id="acc_num" value="{{$sellerBank->acc_num}}"  autofocus/>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1"> Bank Name  </label>
							<input type="text" spellcheck="false" name="name"  class="form-control" id="name" value="{{$sellerBank->name}}"  autofocus/>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Branch Name</label>
							<input type="text" spellcheck="false" name="branch"  class="form-control" id="branch" value="{{$sellerBank->branch}}"  />
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Swift Code </label>
							<input type="text" name="swift_code"  class="form-control" id="swift_code" value="{{$sellerBank->swift_code}}"  />
						</div>

						<div class="form-group">
							<h5 class="box-title">Other Information</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Branch Address </label>
							<textarea name="branch_add" spellcheck="false" rows="4"  class=" form-control" id="branch_add" ></textarea>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Bank BIN No. </label>
							<input type="text" spellcheck="false" name="bin_num"  class=" form-control" id="bin_num" value="{{$sellerBank->bin_num}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Currency Code <i style="color:red;font-size:15px;">*</i> :-</label><br>
							<label for="exampleInputEmail1"><strong><i style="color:red;font-size:15px;">Note: Please enter 3 letter currency code (Example : BDT, USD, EUR ...)</i></strong></label>
							<input type="text" spellcheck="false" name="currency"  class="validate[required,minSize[3],maxSize[3]] form-control" id="currency" value="{{$sellerBank->currency}}"  autofocus/>
						</div>

						<div class="form-group">
							<h5 class="box-title">Basic Contact</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">E-mail </label>
							<input type="email" spellcheck="false" name="email" id="email" class="form-control" value="{{$sellerBank->email}}" />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Phone </label>
							<input type="text" spellcheck="false" name="phone_no" id="phone_no" class="form-control" value="{{$sellerBank->phone_no}}" />
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">RM Name </label>
							<input type="text" name="rm_name"  class="form-control" id="rm_name" value="{{$sellerBank->rm_name}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">RM Mobile </label>
							<input type="text" spellcheck="false" name="rm_mobile_num"  class=" form-control" id="rm_mobile_num" value="{{$sellerBank->rm_mobile_num}}"  autofocus/>
						</div>	
						
					</div>
							<input type="hidden" name="myaction" id="myaction" value="add" />
							<input type="hidden" name="mid" id="mid" value="0" />
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('sellerBank.index')}}" class="btn btn-success">Cancel</a>
						</div>
				</form>
			</div>
		</div>
	</div>		
</section>

@endsection