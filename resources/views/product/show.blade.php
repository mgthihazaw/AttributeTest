@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

            <div class="card" >
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                        <h3 class="text-primary">{{$product->name}}</h3>
                        <p class="text-muted">{{$product->description}}</p>
                      </div>
                      <div class="col-md-4 text-right">
                          <h3 class="text-info">{{$product->price}}</h3>
                      </div>
                  </div>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($values as $value)
                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                          <h5>{{$value->productTypeAttribute->name}}</h5>
                          
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 >{{$value->name}}</h5>
                        </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>




           
        </div>
    </div>

 


</div>


@endsection