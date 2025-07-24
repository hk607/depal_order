{{-- resources/views/admin/products/_form.blade.php --}}

{{-- Category --}}
<div class="form-group row">
    {{ Form::label('category_id', 'Category', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select Category']) }}
    </div>
</div>

{{-- Name --}}
<div class="form-group row">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Name']) }}
    </div>
</div>

{{-- Price --}}
<div class="form-group row">
    {{ Form::label('price', 'Price (₹)', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Enter Price']) }}
    </div>
</div>

{{-- Brand --}}
<div class="form-group row">
    {{ Form::label('brand', 'Brand', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('brand', null, ['class' => 'form-control', 'placeholder' => 'Enter Brand']) }}
    </div>
</div>

{{-- Diet Type --}}
<div class="form-group row">
    {{ Form::label('diet_type', 'Diet Type', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('diet_type', null, ['class' => 'form-control', 'placeholder' => 'e.g. Plant Based']) }}
    </div>
</div>

{{-- Flavour --}}
<div class="form-group row">
    {{ Form::label('flavour', 'Flavour', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('flavour', null, ['class' => 'form-control', 'placeholder' => 'e.g. Natural Nutty Flavour']) }}
    </div>
</div>

{{-- Net Content Volume --}}
<div class="form-group row">
    {{ Form::label('net_content_volume', 'Net Content Volume (ml)', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::number('net_content_volume', null, ['class' => 'form-control', 'placeholder' => 'e.g. 1000']) }}
    </div>
</div>

{{-- Special Feature --}}
<div class="form-group row">
    {{ Form::label('special_feature', 'Special Feature', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('special_feature', null, ['class' => 'form-control', 'placeholder' => 'e.g. Wood Pressed']) }}
    </div>
</div>

{{-- Liquid Volume --}}
<div class="form-group row">
    {{ Form::label('liquid_volume', 'Liquid Volume (ml)', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::number('liquid_volume', null, ['class' => 'form-control', 'placeholder' => 'e.g. 1000']) }}
    </div>
</div>

{{-- Package Quantity --}}
<div class="form-group row">
    {{ Form::label('package_quantity', 'Package Quantity', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::number('package_quantity', 1, ['class' => 'form-control']) }}
    </div>
</div>

{{-- Shelf Life (Days) --}}
<div class="form-group row">
    {{ Form::label('shelf_life_days', 'Shelf Life (Days)', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::number('shelf_life_days', null, ['class' => 'form-control', 'placeholder' => 'e.g. 90']) }}
    </div>
</div>

{{-- Item Form --}}
<div class="form-group row">
    {{ Form::label('item_form', 'Item Form', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('item_form', null, ['class' => 'form-control', 'placeholder' => 'e.g. Liquid']) }}
    </div>
</div>

{{-- Speciality --}}
<div class="form-group row">
    {{ Form::label('speciality', 'Speciality', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('speciality', null, ['class' => 'form-control', 'placeholder' => 'e.g. Preservatives Free, Natural']) }}
    </div>
</div>

{{-- Description --}}
<div class="form-group row">
    {{ Form::label('description', 'Description (About this item)', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::textarea('description', null, [
            'id' => 'description',
            'class' => 'form-control',
            'rows' => 4,
            'placeholder' => 'Enter detailed product description'
        ]) }}
    </div>
</div>
{{-- Product Images --}}
<div class="form-group row">
    {{ Form::label('images[]', 'Product Images', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
        <small class="form-text text-muted">Upload up to 4 images</small>
    </div>
</div>
<div class="form-group row">
@foreach($product->images ?? [] as $img)
    <img src="{{ asset('images/products/' . $img->image) }}" width="100" height="100">
@endforeach
</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('meta_description');
    CKEDITOR.replace('description');
</script>
