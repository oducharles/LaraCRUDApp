@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product Catalogue</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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
                                            <p>{{\Session::get('success')}}, scroll down and check records</p>
                                        </div>
                                    @endif
                                </div>

                                @if($prod)
                                    <div class="row register-form">
                                        <div class="col-md-8 col-md-offset-2">
                                            <form class="form-horizontal custom-form" method="post" action="{{action('prodController@update', $id)}}" enctype="multipart/form-data">
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
                                                <div class="form-group">
                                                    <div class="col-sm-4 label-column">
                                                        <label class="control-label">Upload product details/picture</label>
                                                    </div>
                                                    <div class="col-sm-6 input-column">
                                                        <input class="form-control" type="file" name="p_detail" value="{{$prod->p_detail}}">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-default submit-button">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif

                                @if(!$prod)
                                <form class="form-horizontal custom-form" method="post" action="{{action('prodController@store')}}" enctype="multipart/form-data">
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
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4 label-column">
                                            <label class="control-label">Upload product details/picture</label>
                                        </div>
                                        <div class="col-sm-6 input-column">
                                            <input class="form-control" type="file" name="p_detail">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-default submit-button" value="Save product">
                                </form>
                                @endif       
                            </div>
                        </div>
                        @if($message = Session::get('success'))
                            <div>
                                <p>{{$message}}</p>
                            </div>
                        @endif
                        <h1 align="center" style="background-color: lightgrey; margin: 10px; border-radius: 10px">Product Details</h1>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>PRODUCT NAME</th>
                                        <th>PRODUCT TYPE</th>
                                        <th>PRODUCT PRICE</th>
                                        <th>PRODUCT FILE</th>
                                        <th>UPDATE</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prodinfox as $row)
                                        <tr>
                                            <td>{{$row['p_name']}}</td>
                                            <td>{{$row['p_type']}}</td>
                                            <td>{{$row['p_price']}}</td>
                                            <td><a href="{{action('prodController@show', $row['id'])}}">View file</a></td>
                                            <td><button><a style="text-decoration:none;" href="{{action('prodController@edit', $row['id'])}}">Edit</a></button></td>
                                            <td>
                                                <form method="post" class="deleteprod" action="{{action('prodController@destroy', $row['id'])}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
