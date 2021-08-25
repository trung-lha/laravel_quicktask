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
        <button id="add_type_button" type="button" class="btn btn-outline-primary">{{ __('index.add_type') }}</button>
      </div>
</div>
{{-- add type form start--}}
<div>
    <div class="form-popup-type" id="add_type_form">
        <form class="form-container" method="post" id="add_product" action="{{ route('types.store') }}">
          @csrf
            <h4>{{ __('index.type_form_title') }}</h4>
            <br>
            <label for="name"><b>{{ __('index.type_form_1') }}</b></label>
            <input type="text" placeholder="{{ __('index.place_holder_name') }}" name="name" id="name_type" required>
  
            <button type="submit" class="btn btn-primary" id="submit_type_button">{{ __('index.submit') }}</button>
            <button type="button" class="btn cancel" id="cancel_type">{{ __('index.cancel') }}</button>
        </form>
    </div>
</div>
{{-- add type form end --}}
<table class="customers">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th class="td_button">{{ __('index.table_thread5') }}</th>
        </tr>
    </thead>
    <tbody>
        @if (@isset($types))
            @foreach ($types as $type)
                <tr>
                    <td id={{ 'name_' . $type->name }}>{{ $type->name }}</td>
                    <td id={{ 'description_' . $type->description }}>{{ $type->description }}</td>
                    <td id={{ 'button_' . $type->id }} class="td_button">
                        {{-- <button class="btn btn-warning update_data" id={{ "update_button_" . $product->id }}>Update</button> --}}
                        <button type="button" class="btn btn-warning edit-product-btn" data-bs-toggle="modal" data-bs-target="#editProductModal"
                        data-id="{{ $type->id }}" data-name="{{ $type->name }}" data-description="{{ $type->description }}">
                        Update
                        </button>
                        <form action="{{ route('types.destroy', $type->id) }}" method="post" class="delete-btn">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá hết loại sản phẩm này?');">
                                Delete
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
    </tbody>
</table>  
<!-- Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">{{ __('index.update_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('types.update', "edit") }}">
                    @csrf
                    @method("PUT")
                    <input type="hidden" id="passing_id" name="id">
                    <div class="form-group">
                        <label for="name">{{ __('index.update_form1') }}</label>
                        <input type="text" name="name" class="form-control" id="passing_name" placeholder="Enter product name" required>
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
@endsection
