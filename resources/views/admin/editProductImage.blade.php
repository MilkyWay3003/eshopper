@extends('layouts.admin')

@section('center')

    <div class = "" style = "margin-left:20px;padding-bottom: 20px;width:50%;">

    <h1>Current Image</h1>
    <div><img src = "{{Storage::disk('local')->url('product_images/'.$product['image'])}}"></div>

    <form action = "/admin/editProductImage/{{$product->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class = "form-group">
            <label for ="description">Update Image</label>
            <input type="file" class="" name="image" id = "image" placeholder="Image" value = {{$product->image}} required>
        </div>

        <button type = "submit" name ="submit" class = "btn btn-default">Update Image</button>
    </form>
    </div>
@endsection



