@extends('layouts.admin')

@section('center')
    <div class = "table-responsive">
        <table class = "table table-striped">
            <thread>
                <tr>
                    <th>#id</th>
                    <th>Total Price</th>
                    <th>date ordered</th>
                    <th>status</th>
                    <th>Delivery</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>userId</th>
                    <th>Edit Order</th>
                    <th>Remove</th>
                    <th>Order Info</th>
                </tr>
            </thread>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>${{$order->price}}</td>
                    <td>{{$order->date}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->del_date}}</td>
                    <td>{{$order->first_name}}</td>
                    <td>{{$order->last_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->user_id}}</td>
                    <td><a href ="{{route('editOrder',['id' => $order->id])}}" class = "btn btn-success">Edit Order</a></td>
                    <td><a href ="{{route('deleteOrder',['id' => $order->id])}}" class = "btn btn-warning">Remove</a></td>
                    <td> <a href="{{route('orderInfo',['id' => $order->id])}}" class="btn btn-primary">
                            Order Info
                        </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Button trigger modal -->




        {{$orders->links()}}
    </div>
@endsection
