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
    <div class="offset-md-3 col-md-6">
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
    <div class="offset-md-3 col-md-6">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="active" id="active" 
                value="true" {{ ((isset($post) && $post->active) ? 'checked' : '') }}>
            {!! Form::label('active', __('Active', ['class'=>'form-check-label'])) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="offset-md-3 col-md-3">
        <div class='form-group text-left'>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class='form-group text-right'>
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        </div>
    </div>
</div>