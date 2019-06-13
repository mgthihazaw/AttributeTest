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
            @if ($message = Session::get('error'))
            <div class="alert alert-warning alert-block">
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
                
                
            </div>
            <table class="table table-hover table-borderless">
                    <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col"  >Name</th>
                              
                              
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                  
                <tbody>
                    @foreach($attributes as $attribute)
                  <tr>
                    <th scope="row">{{$attribute->id}}</th>
                    <td >{{$attribute->name}}</td>
                    
                  <td><a data-toggle="modal" data-id="{{$attribute->id}}" data-target="#exampleModal" class="btn btn-success addValue" id="addValue">Add New Attribute</a></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
        </div>
        
    </div>

    <!---Modal------------------>
    <div class="modal fade" class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Product Attribute</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form  method="POST" action="{{ route('products.update',$product->id)}}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                      
                        <div class="form-group row ">
                                <div class="col-md-4">
                                  <label for="type" class="pt-2">Type</label>
                                </div>
                                <div class="col-md-8">
                                  <select name="attribute" id="attributeValue" class="form-control attributValue">
                                      
                                      <option value="">Select Attribute Value</option>
                                      
                                  </select>
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


<script>
        $(document).ready(function(){
           $('.addValue').click(function(e){
            $('#attributeValue option').remove();
            
              let id=$(this).data('id');
              let link="/attributes/"+id+"/values"
              $.ajax({
                 url: "/attributes/"+id+"/values",
                 method: 'get',
                 
                 success: function(results){
                    let select=$('#attributeValue')
                    
                    
                    results.forEach(function(result){
                       
                        
                       select.append("<option value="+result.id+">"+result.name+"</option>") 
                    })
                    
                 }});
              });
           });
     </script>

@endsection