@extends('layouts.admin')

@section('center')

    <div class = "table-responsive">
        <table class = "table table-striped">
            <thread>
                <tr>
                    <th>Item</th>
                    <th>price</th>
                    <th>quantity</th>
                </tr>
            </thread>
            <tbody>

              @foreach($items as $item)
                <tr>
                      <td>{{$item->item_name}}</td>
                      <td>{{$item->item_price}}</td>
                      <td>{{$item->quantity}}</td>
                </tr>
             @endforeach
            </tbody>
        </table>

        <!-- Button trigger modal -->
    </div>

@endsection
