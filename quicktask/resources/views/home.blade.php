@extends('layouts/app')

@section('content')
<div class="title_table">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{ __('index.option_display') }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('products.index') }}">{{ __('index.table_name') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('types.index') }}">{{ __('index.type_table') }}</a></li>
        </ul>
    </div>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
      <button id="add_product_button" type="button" class="btn btn-outline-primary">{{ __('index.add_product') }}</button>
    </div>
</div>
<div>
  <div class="form-popup" id="add-form">
      <form class="form-container" method="post" id="add_product" action="{{ route('products.store') }}">
          @csrf
          <h4>{{ __('index.pro_form_title') }}</h4>
          <br>
          <label for="code"><b>{{ __('index.pro_form_1') }}</b></label>
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="type_id">
              @if (@isset($type))
                  <option selected value="0">{{ __('index.select') }}</option>
                  @foreach ($type as $item)
                      <option value={{ $item->id }}>{{ $item->name }}</option>
                  @endforeach
              @endif
          </select>
          <label for="name"><b>{{ __('index.pro_form_2') }}</b></label>
          <input type="text" placeholder="{{ __('index.place_holder_name') }}" name="name" id="name_add_form" required>
          <label for="price"><b>{{ __('index.pro_form_3') }}</b></label>
          <input type="number" placeholder="{{ __('index.place_holder_price') }}" name="price" id="price_add_form" required>
          <label for="quantity"><b>{{ __('index.pro_form_4') }}</b></label>
          <input type="number" placeholder="{{ __('index.place_holder_quantity') }}" name="quantity" id="quantity_add_form" required>
          <button type="submit" class="btn btn-primary" id="add_button">{{ __('index.submit') }}</button>
          <button type="button" class="btn cancel">{{ __('index.cancel') }}</button>
      </form>
  </div>
</div>
<table class="customers">
    <thead>
        <tr>
            <th>{{ __('index.table_thread1') }}</th>
            <th>{{ __('index.table_thread2') }}</th>
            <th>{{ __('index.table_thread3') }}</th>
            <th>{{ __('index.table_thread4') }}</th>
            <th class="td_button">{{ __('index.table_thread5') }}</th>
        </tr>
    </thead>
    <tbody>
        @if (@isset($data))
            @foreach ($data as $product)
                <tr>
                    <td id={{ 'code_' . $product->id }}>{{ $product->name }}</td>
                    <td id={{ 'name_' . $product->id }}>{{ $product->productName }}</td>
                    <td id={{ 'price_' . $product->id }}>{{ $product->price }}</td>
                    <td id={{ 'quantity_' . $product->id }}>{{ $product->quantity }}</td>
                    <td id={{ 'button_' . $product->id }} class="td_button">
                        {{-- <button class="btn btn-warning update_data" id={{ "update_button_" . $product->id }}>Update</button> --}}
                        <button type="button" class="btn btn-warning edit-product-btn" data-bs-toggle="modal" data-bs-target="#editProductModal"
                        data-id="{{ $product->id }}" data-name="{{ $product->productName }}" data-description="{{ $product->productDescription }}"
                        data-price="{{ $product->price }}" data-quantity="{{ $product->quantity }}">
                        {{ __('index.update') }}
                        </button>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-btn">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này?');">
                                {{ __('index.delete') }} 
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">{{ __('index.no_data') }}</td>
            </tr>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">{{ __('index.update_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('products.update', "edit") }}">
                        @csrf
                        @method("PUT")
                        <input type="hidden" id="passing_id" name="id">
                        <div class="form-group">
                            <label for="name">{{ __('index.update_form1') }}</label>
                            <input type="text" name="name" class="form-control" id="passing_name" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('index.update_form2') }}</label>
                            <input type="number" name="price" class="form-control" id="passing_price" placeholder="Enter product price" required>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('index.update_form3') }}</label>
                            <input type="number" name="quantity" class="form-control" id="passing_quantity" placeholder="Enter product quanntity" required>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('index.update_form4') }}</label>
                            <textarea name="description" class="form-control" id="passing_des" placeholder="Enter product description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary edit-product-submit-btn" type="submit">{{ __('index.done') }}</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('index.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </tbody>
</table>  
@endsection
