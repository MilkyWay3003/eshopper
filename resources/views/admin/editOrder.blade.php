@extends('layouts.admin')


@section('center')

    <div class = "" style = "margin-left:20px;padding-bottom: 20px;width:50%;">
        <form action = "/admin/updateOrder/{{$order->id}}" method = "post" enctype="multipart/form-data">

            {{csrf_field()}}


            <div class="form-group">
                <label for="exampleFormControlInput1">Total price</label>
                <input type="" name = "price" value = "{{$order->price}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('price') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Date Ordered</label>
                <input type="" name = "date" value = "{{$order->date}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('date') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Status</label>
                <input type=""  name = "status" value = "{{$order->status}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('status') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Delivery</label>
                <input type=""  name = "del_date" value = "{{$order->del_date}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('del_date') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">First Name</label>
                <input type=""  name = "first_name" value = "{{$order->first_name}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('first_name') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Last Name</label>
                <input type=""  name = "last_name" value = "{{$order->last_name}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('last_name') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type=""  name = "email" value = "{{$order->email}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('email') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Address</label>
                <input type=""  name = "address" value = "{{$order->address}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('address') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Phone</label>
                <input type=""  name = "phone" value = "{{$order->phone}}" class="form-control" id="" placeholder="">
                @if ($errors->any())
                    @foreach ($errors->get('phone') as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
            </div>


            <input type = "submit" class = "btn btn-primary" value="Edit Order">
        </form>

    </div>
@endsection