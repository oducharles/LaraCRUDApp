@extends('product')

@section('content')

<div class="row register-form">
            <div class="col-md-8 col-md-offset-2">
                <div style="align-content: center; color: red; background: #FFE4C4; margin: 10px; text-decoration: wavy;">
                    @if(count($errors)>0)
                    <ul>
                        @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                    @endif

                    @if(\Session::has('success'))
                    <div>
                        <p>{{\Session::get('success')}}</p>
                    </div>
                    @endif
                </div>
           	
                <form class="form-horizontal custom-form" method="post" action="{{url('productline')}}">
                	{{csrf_field()}}

                    <h1>Register Product</h1>
                    
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label">Product Name</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="p_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label">Product Type</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="p_type">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label">Product Price</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="p_price">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-default submit-button" value="Save product">
                </form>
            </div>
        </div>
@endsection