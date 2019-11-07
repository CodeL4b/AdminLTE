@extends('layouts.master')
@section('content')

<section class="col-md-12">
	<h4>Add New Product Information</h4>
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

				<form id="product_frm" action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
					<div class="box-body">
						@csrf
						@method('PUT')

						<div class="form-group">
							<h5 class="box-title">Basic Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Product Code <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="code_sku"  class="validate[required] form-control" id="code_sku" value="{{$product->code_sku}}"  autofocus/>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Product Name <i style="color:red;font-size:15px;">*</i> </label>
							<input type="text" spellcheck="false" name="name"  class="validate[required] form-control" id="name" value="{{$product->name}}"  autofocus/>
						</div>	

						<div class="form-group">
							<label for="exampleInputEmail1">Product Description</label>
							<textarea name="description" spellcheck="false" rows="4"  class=" form-control" id="description" ></textarea>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">H.S. Code BD</label>
							<input type="text" spellcheck="false" name="hs_code_bd"  class="form-control" id="hs_code_bd" value="{{$product->hs_code_bd}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">H.S. Code </label>
							<input type="text" spellcheck="false" name="hs_code"  class=" form-control" id="hs_code" value="{{$product->hs_code}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Product Photo <i style="color:red;font-size:15px;">*</i> </label>
						</div>

						<div class="row">
                      		<div class="col-sm-3 imgUp">
                        		
                    			<label class="btn btnn-primary">
                            		Upload Image
                            		<input type="file" class="uploadFile img" value="Upload Photo" name="photo" id="photo" value="{{$product->photo}}" style="width: 0px;height: 0px;overflow: hidden;" >
                                </label>
                      		</div>
                        </div>

						<div class="form-group">
							<h5 class="box-title">Weight Info</h5>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Weight Unit</label>
							<input type="text" spellcheck="false" name="unit"  class="form-control" id="unit" value="{{$product->unit}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Net Weight</label>
							<input type="text" spellcheck="false" name="net_weight"  class=" form-control" id="net_weight" value="{{$product->net_weight}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Gross Weight </label>
							<input type="text" spellcheck="false" name="gross_weight"  class="form-control" id="gross_weight" value="{{$product->gross_weight}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">CBM Weight</label>
							<input type="text" spellcheck="false" name="cbm" id="cbm" class="form-control" value="{{$product->cbm}}" />
						</div>

						<div class="form-group">
							<h5 class="box-title">Price Info</h5>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Product Cost</label>
							<input type="text" spellcheck="false" name="product_cost"  class="form-control" id="product_cost" value="{{$product->product_cost}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Packing Cost</label>
							<input type="text" spellcheck="false" name="packing_cost"  class=" form-control" id="packing_cost" value="{{$product->packing_cost}}"  />
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Cash Incentive</label>
							<input type="text" spellcheck="false" name="cash_incentive"  class="form-control" id="cash_incentive" value="{{$product->cash_incentive}}"  />
						</div>
						
						
						
					</div>
							<input type="hidden" name="myaction" id="myaction" value="add" />
							<input type="hidden" name="mid" id="mid" value="0" />
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('product.index')}}" class="btn btn-success">Cancel</a>
						</div>
				</form>
			</div>
		</div>
	</div>		
</section>

@endsection