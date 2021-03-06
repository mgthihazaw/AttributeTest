@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            
            
            @if($errors)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $error }}</strong>
            </div>
            @endforeach
            @endif
            <div class="row my-2">
                    
                <div class="col-md-10">
                        <h3 >Product Type Table</h3>
                </div>
                <div class="float-right col-md-2 text-right">
                <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add New</a>
                </div>
                
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                  <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->productType->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      <a href="{{route('products.show',$product->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>

    <!---Modal------------------>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Product Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form  method="POST" action="{{ route('products.store')}}">
                @csrf
                  <div class="form-group row ">
                    <div class="col-md-4">
                      <label for="name" class="pt-2">Name</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="name" id="name" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row ">
                      <div class="col-md-4">
                        <label for="description" class="pt-2">Description</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="description" id="description" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row ">
                            <div class="col-md-4">
                              <label for="type" class="pt-2">Type</label>
                            </div>
                            <div class="col-md-8">
                              <select name="type" id="type" class="form-control">
                                  @foreach($types as $type)
                                  <option value="{{$type->id}}">{{$type->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row ">
                              <div class="col-md-4">
                                <label for="price" class="pt-2">Price</label>
                              </div>
                              <div class="col-md-8">
                                <input type="number" name="price" id="price" class="form-control">
                              </div>
                            </div>
                    <div class="pt-2 ">
                        <input type="submit" value="Save changes" class="btn btn-primary" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>   
            </div>
            
          
          </div>
        </div>
      </div>


</div>


@endsection