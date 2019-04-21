@extends('layouts.admin')


@section('center')

    <div class = "" style = "margin-left:20px;padding-bottom: 20px;width:50%;">
    <form action = "/admin/updateProduct/{{$product->id}}" method = "post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="" name = "name" value = "{{$product->name}}" class="form-control" id="" placeholder="">
            @if ($errors->any())
                @foreach ($errors->get('name') as $error)
                    <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type=""  name = "description" value = "{{$product->description}}" class="form-control" id="" placeholder="">
            @if ($errors->any())
                @foreach ($errors->get('description') as $error)
                    <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type=""  name = "price" value = "{{$product->price}}" class="form-control" id="" placeholder="">
            @if ($errors->any())
                    @foreach ($errors->get('price') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Type</label>
            <input type=""  name = "type" value = "{{$product->type}}" class="form-control" id="" placeholder="">
            @if ($errors->any())
                @foreach ($errors->get('type') as $error)
                    <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        <input type = "submit" class = "btn btn-primary" value="Edit product">
    </form>

    </div>
@endsection