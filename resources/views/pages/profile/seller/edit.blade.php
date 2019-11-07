@extends('layouts.master')
@section('content')



<section class="col-md-12">
	<h4>Update seller Information</h4>
</section>
<div> . </div>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
			<div class="box box-primary">

				<form id="seller_frm" action="{{route('seller.update', $seller->id)}}" method="post" enctype="multipart/form-data">
					<div class="box-body">
						@csrf
						@method('PUT')
						
						<div class="form-group">
							<h5 class="box-title">Basic Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Busniess Name <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="business_name"  class="validate[required] form-control" id="business_name" value="{{$seller->business_name}}"  autofocus/>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Office Address <i style="color:red;font-size:15px;">*</i> </label>
							<textarea name="office_add" spellcheck="false" rows="4"  class="validate[required] form-control" id="office_add"  ></textarea>
						</div>	

						<div class="form-group">
							<label for="exampleInputEmail1">Factory Address</label>
							<textarea name="factory_add" spellcheck="false" rows="4"  class=" form-control" id="factory_add"  ></textarea>
						</div>

						<div class="form-group">
							<h5 class="box-title">Contact Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">seller E-mail </label>
							<input type="email" spellcheck="false" name="email" id="email" class="form-control" value="{{$seller->email}}"/>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">FAX No. </label>
							<input type="text" spellcheck="false" name="fax_no" id="fax_no" class="form-control" value="{{$seller->fax_no}}" />
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Phone Number </label>
							<input type="text" name="phone_no"  class="form-control" id="phone_no" value="{{$seller->phone_no}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Contact Person </label>
							<input type="text" spellcheck="false" name="contact_person"  class=" form-control" id="contact_person" value="{{$seller->contact_person}}"  autofocus/>
						</div>

						<div class="form-group">
							<h5 class="box-title">Busniess Info</h5>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Bin Vat No.</label>
							<input type="text" spellcheck="false" name="bin_vat_no"  class="form-control" id="bin_vat_no" value="{{$seller->bin_vat_no}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">ERC No. </label>
							<input type="text" spellcheck="false" name="erc_no"  class=" form-control" id="erc_no" value="{{$seller->erc_no}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">IRC No. </label>
							<input type="text" spellcheck="false" name="irc_no"  class="form-control" id="irc_no" value="{{$seller->irc_no}}"  />
						</div>
						
						
						
					</div>
							<input type="hidden" name="myaction" id="myaction" value="add" />
							<input type="hidden" name="mid" id="mid" value="0" />
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('seller.index')}}" class="btn btn-success">Cancel</a>
						</div>
				</form>
			</div>
		</div>
	</div>		
</section>

@endsection