@if ($errors->any())
    <div class="alert alert-danger alert-dismissible"> 
       <ul>
            @foreach ($errors->all() as $error)
               <li>{!! $error !!}</li>
            @endforeach
       </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, [
                'id' => 'title',
                'class' => 'form-control',
                'placeholder' => __('A cool title here')
            ]) }}
        </div>
    </div>
</div>

<div class='form-group'>
    {!! Form::label('text', __('Text')) !!}
    {!! Form::textarea('text', null, [
        'id' => 'text', 
        'class' => 'form-control', 
        'placeholder' => __('Just write something nice here')
    ]) !!}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="active" id="active" 
                value="true" {{ ((isset($post) && $post->active) ? 'checked' : '') }}>
            {!! Form::label('active', __('Active', ['class'=>'form-check-label'])) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12  text-right">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>