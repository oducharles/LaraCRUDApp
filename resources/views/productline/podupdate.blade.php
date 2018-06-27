@extends('product')

@section('content')
<div style="align-content: center; background: #FFE4C4; text-decoration: wavy;">
	@if(count($errors)>0)
	        <ul >
	            @foreach($errors->all() as $errors)
	            <li>{{$errors}}</li>
	            @endforeach
	        </ul>
	        @endif
</div>
			
<div class="row register-form">
            <div class="col-md-8 col-md-offset-2">
<form class="form-horizontal custom-form" method="post" action="{{action('prodController@update', $id)}}">
                	{{csrf_field()}}

                    <h1>Update Product</h1>
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label">Product Name</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="p_name" value="{{$prod->p_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label">Product Type</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="p_type" value="{{$prod->p_type}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label">Product Price</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="p_price" value="{{$prod->p_price}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default submit-button">Edit</button>
                </form>
            </div>
    </div>
@endsection