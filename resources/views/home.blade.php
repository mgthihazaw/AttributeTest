@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form class=" my-2 my-lg-0 row">
                        <div class="form-group mr-2 col-md-3">
                            <h6 class="text-center">Select Product Type</h6>
                                <select name="type" id="type" class="form-control type">
                                        <option value="" disabled>Choose Type</option>
                                        @foreach($types as $type)
                                         <option value="{{$type->id}}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="form-group mr-2 col-md-3">
                                <h6 class="text-center">Select Product</h6>
                                
                                <select name="type" id="product" class="form-control product" disabled>
                                       
                                 </select>
                        </div>
                        <div class="form-group mr-2 col-md-3">
                            <br>
                        <button class="btn btn-outline-success my-2 my-sm-0 search " type="button" >Search</button>
                        </div>
                      </form>
                </div>

                <div class="card-body">
                        <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Attribute</th>
                                    
                                    <th scope="col">Price</th>
                                    
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    
                                  <tr>
                                    <td scope="row " class="id"></th>
                                    <td class="name"></td>
                                    <td class="attribute"></td>
                                    <td class="price"></td>
                                    
                                    
                                    
                                  </tr>
                                  
                                  
                                </tbody>
                              </table>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
        $(document).ready(function(){
            
           $('.type').change(function(e){
            $('#product option').remove();
            $('#product').append("<option value='' disabled>Choose Product</option>")
              let id=$('.type').val();
            //   console.log(id);
              
              
              $.ajax({
                 url: "/producttypes/"+id+"/product",
                 method: 'get',
                 
                 success: function(results){
                    document.getElementById('product').disabled=false
                    let select=$('#product')
                    
                    
                    results.forEach(function(result){
                       let attr=""
                       result.product_type_attribute_values.forEach(function(value){
                           attr+= " "+value.name
                       })
                        
                       select.append("<option value="+result.id+">"+result.name + attr+"</option>") 
                    })
                    
                 }});
              });

              $('.search').click(function(e){
                let id=$('.product').val();
            //   console.log("Product",id);
            $('.id').text("")
                     $('.name').text("")
                     $('.price').text("")
                    
                     $('.attribute').text("")
              
              $.ajax({
                 url: "/product/"+id+"/getproduct",
                 method: 'get',
                 
                 success: function(results){
                    
                    $('.id').append(results.product.id)
                     $('.name').append(results.product.name)
                     $('.price').append(results.product.price)
                     let attr=""
                     results.values.forEach(function(result){
                       
                        attr+=`${result.name},`
                       
                    })
                     $('.attribute').append(attr)
                    
                 }});
               });
           });
     </script>
@endsection
