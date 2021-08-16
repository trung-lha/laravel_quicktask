@extends('layouts/app')

@section('content')
<table class="customers">
    <thead>
        <tr>
            <th>Product code</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th class="td_button">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (@isset($data))
            @foreach ($data as $product)
                <tr>
                    <td id={{ 'code_' . $product->id }}>{{ $product->code }}</td>
                    <td id={{ 'name_' . $product->id }}>{{ $product->name }}</td>
                    <td id={{ 'price_' . $product->id }}>{{ $product->price }}</td>
                    <td id={{ 'quantity_' . $product->id }}>{{ $product->quantity }}</td>
                    <td id={{ 'button_' . $product->id }} class="td_button">
                        <button class="btn-warning update_data">Update</button>
                        <button class="btn-danger del_data">Delete</button>
                        <button class="btn-success save_data">Save</button>
                        <button class="btn-danger cancel_data">Cancel</button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No data</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection
