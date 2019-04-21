@extends('layouts.admin')


@section('center')

    <h1>Create New Product</h1>
    <div class = "" style = "margin-left:20px;padding-bottom: 20px;width:50%;">
        <form action = "/admin/addProductStore" method = "post" enctype="multipart/form-data">

            {{csrf_field()}}



            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="" name = "name" value = "" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('name') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <input type=""  name = "description" value = "" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('description') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class = "form-group">
                <label for ="">Add Image</label>
                <input type="file" class="" name="image" id = "image" placeholder="Image" value = "" required>
                @if ($errors->any())
                    @foreach ($errors->get('image') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type=""  name = "price" value = "" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('price') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Type</label>
                <input type=""  name = "type" value = "" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('type') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <input type = "submit" class = "btn btn-primary" value="Add product">
        </form>

    </div>
@endsection

