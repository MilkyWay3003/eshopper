@extends('layouts.admin')

@section('center')
   <div class = "table-responsive">
       <table class = "table table-striped">
           <thread>
               <tr>
                   <th>#id</th>
                   <th>image</th>
                   <th>Name</th>
                   <th>Description</th>
                   <th>Price</th>
                   <th>Type</th>
                   <th>Edit Image</th>
                   <th>Edit</th>
                   <th>Remove</th>
               </tr>
           </thread>
           <tbody>
                  @foreach($products as $product)
                      <tr>
                          <td>{{$product->id}}</td>
                          <td><img src = "{{asset('storage')}}/product_images/{{$product['image']}}" style = "width:100px;height:100px;"></td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->description}}</td>
                          <td>{{$product->price}}</td>
                          <td>{{$product->type}}</td>
                          <td><a href ="{{route('admin.editProductImageForm',['id' => $product->id])}}" class = "btn btn-primary">Edit Image</a></td>
                          <td><a href ="{{route('admin.editProduct',['id' => $product->id])}}" class = "btn btn-success">Edit</a></td>
                          <td><a href ="{{route('admin.deleteProduct',['id' => $product->id])}}" class = "btn btn-warning">Remove</a></td>
                      </tr>
                  @endforeach
           </tbody>
       </table>

       {{$products->links()}}
   </div>
@endsection
