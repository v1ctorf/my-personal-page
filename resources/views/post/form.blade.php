@section('page_style')
    <style type="text/css">
        .just-dark,.just-dark:focus{background-color:#16161d;color:#ccc;}
        textarea{font-family:monospace;}
    </style>
@endsection

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
            {{ Form::label('headline', 'Headline', ['class'=>'text-secondary']) }}
            {{ Form::text('headline', null, [
                'id' => 'headline',
                'class' => 'form-control just-dark',
                'placeholder' => __('A cool headline here')
            ]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class='form-group'>
            {{ Form::label('subhead', 'Subhead', ['class'=>'text-secondary']) }}
            {{ Form::text('subhead', null, [
                'id' => 'subhead',
                'class' => 'form-control just-dark',
                'placeholder' => __('A clever subhead here')
            ]) }}
        </div>
    </div>
</div>

<div class='form-group'>
    {!! Form::label('body_copy', __('Body Copy'), ['class'=>'text-secondary']) !!}
    {!! Form::textarea('body_copy', null, [
        'id' => 'body_copy', 
        'class' => 'form-control just-dark', 
        'placeholder' => __('Just write something nice here. Markdown is supported.')
    ]) !!}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="visible" id="visible" 
                value="true" {{ ((isset($post) && $post->visible) ? 'checked' : '') }}>
            {!! Form::label('visible', __('Visible'), ['class'=>'form-check-label text-secondary']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-right">
        @if(isset($post))
            <button type="submit" class="btn btn-outline-danger" form="delete_post" class="delete">
                {{ __('Delete') }}
            </button>
        @endif
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-outline-success']) !!}
    </div>
</div>