{{-- resources/views/admin/categories/_form.blade.php --}}

{{-- Name --}}
<div class="form-group row">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) }}
    </div>
</div>

{{-- Slug --}}
<div class="form-group row">
    {{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Auto or Manual Slug']) }}
    </div>
</div>

{{-- Description --}}
<div class="form-group row">
    {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Enter Description']) }}
    </div>
</div>

{{-- Meta Key --}}
{{-- <div class="form-group row">
    {{ Form::label('meta_key', 'Meta Keywords', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('meta_key', null, ['class' => 'form-control', 'placeholder' => 'Enter meta keywords']) }}
    </div>
</div> --}}

{{-- Meta Description --}}
{{-- <div class="form-group row">
    {{ Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::textarea('meta_description', null, [
            'id' => 'meta_description',
            'class' => 'form-control',
            'rows' => 3,
            'placeholder' => 'Enter meta description'
        ]) }}
    </div>
</div> --}}

<div class="form-group row">
    {{ Form::label('images[]', 'Category Banner Images', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
         {{-- You can upload up to <strong>4 images</strong>. Max size per image: <strong>2MB</strong>. --}}
    </div>
</div>
<div class="form-group row">
    <img src="{{ asset('images/category/' . $category->banner_image) }}" width="100" height="100">

</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('meta_description');
</script>
