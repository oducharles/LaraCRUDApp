@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Product Catalogue </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> {{ session('status') }} </div>
                    @endif
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

                    <div class="row">
                        <div class="col-md-12" id="product-list">
                            <h5 align="center" style="background-color: lightgrey; margin: 10px; border-radius: 10px"> Product Lists </h5>
                            <button class="btn btn-sm btn-info float-right mb-2" id="add-product">
                                <strong>+</strong> New Product
                            </button>
                            <div class="table-responsive table-sm">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> Product </th>
                                            <th> Type </th>
                                            <th> Unit Price </th>
                                            <th> QTY </th>
                                            <th>  </th>
                                            <th> ACTION </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($prodinfox as $row)
                                            <tr>
                                                <td>{{$row['p_name']}}</td>
                                                <td>{{$row['p_type']}}</td>
                                                <td>{{$row['p_price']}}</td>
                                                <td> 6 </td>
                                                <td><a href="{{action('ProductController@show', $row['id'])}}">View file</a></td>
                                                <td>
                                                    <div class="row">
                                                        <button class="btn btn-warning btn-sm edit-product"><a style="text-decoration:none;" href="{{action('ProductController@edit', $row['id'])}}">Edit</a></button>

                                                        <form method="post" class="deleteprod" action="{{action('ProductController@destroy', $row['id'])}}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE"/>
                                                            <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-2 d-none" id="add-new-product">
                            <div class="card">
                                <div class="card-header"> {{$prod?'Edit':'Register'}} Product </div>
                                <div class="card-body">
                                    <form class="form-horizontal custom-form" method="post" action="{{ $prod ? '/update_product':'/register_product'}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        @if($prod)
                                            <input type="hidden" name="p_id" value="{{$prod->id}}">
                                        @else
                                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                        @endif

                                        <div class="form-group">
                                            <label class="control-label"> Product Name </label>
                                            <input class="form-control" type="text" name="p_name" value="{{$prod->p_name ?? null}}">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label class="control-label"> Product Type </label>
                                                <input class="form-control" type="text" name="p_type" value="{{$prod->p_type ?? null}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label"> Unit Price </label>
                                                <input class="form-control" type="number" name="p_price" value="{{$prod->p_price ?? null}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> Upload product details/picture </label>
                                            <input class="form-control" type="file" name="p_detail" value="{{$prod->p_details ?? null}}">
                                        </div>
                                        <input type="submit" class="btn btn-default submit-button" value="{{$prod?'Update':'Save'}} Product">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function(event) { 
      
        var product = {!! json_encode($prod) !!}
        var add_product = document.getElementById('add-product');
        var product_list = document.getElementById('product-list');
        var product_form = document.getElementById('add-new-product');
      
        add_product.onclick = function(e){
            alert('yes')
            show_form();
        };

        if (product) {
            show_form();
        }

        function show_form() {
            product_list.classList.remove('col-md-12');
            product_list.classList.add('col-md-8');
            product_form.classList.remove('d-none');
        }
    });
</script>
@endsection
