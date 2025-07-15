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
<div class="form-group row">
    {{ Form::label('meta_key', 'Meta Keywords', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::text('meta_key', null, ['class' => 'form-control', 'placeholder' => 'Enter meta keywords']) }}
    </div>
</div>

{{-- Meta Description --}}
<div class="form-group row">
    {{ Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-8">
        {{ Form::textarea('meta_description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Enter meta description']) }}
    </div>
</div>
