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
            {{ Form::label('headline', 'Headline') }}
            {{ Form::text('headline', null, [
                'id' => 'headline',
                'class' => 'form-control',
                'placeholder' => __('A cool headline here')
            ]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class='form-group'>
            {{ Form::label('subhead', 'Subhead') }}
            {{ Form::text('subhead', null, [
                'id' => 'subhead',
                'class' => 'form-control',
                'placeholder' => __('A clever subhead here')
            ]) }}
        </div>
    </div>
</div>

<div class='form-group'>
    {!! Form::label('body_copy', __('Body Copy')) !!}
    {!! Form::textarea('body_copy', null, [
        'id' => 'body_copy', 
        'class' => 'form-control', 
        'placeholder' => __('Just write something nice here')
    ]) !!}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="visible" id="visible" 
                value="true" {{ ((isset($post) && $post->visible) ? 'checked' : '') }}>
            {!! Form::label('visible', __('Visible', ['class'=>'form-check-label'])) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-right">
        @if(isset($post))
            <button type="submit" class="btn btn-danger" form="delete_post" class="delete">
                {{ __('Delete') }}
            </button>
        @endif
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>