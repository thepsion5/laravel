@if(Session::has('message'))
<p> {{ Session::get('message') }} </p>
@endif
{{ Form::open(array('method' => 'POST')) }}
    <ul>
        <li> {{ Form::label('title') }} </li>
        <li> {{ Form::text('title') }} </li>
        @if($errors->has('title'))
        <li> {{ $errors->first('title') }}
        @endif
        <li> {{ Form::label('slug') }} </li>
        <li> {{ Form::text('slug') }} </li>
        @if($errors->has('slug'))
        <li> {{ $errors->first('slug') }}
        @endif
        <li> {{ Form::label('author_id', 'Author ID') }} </li>
        <li> {{ Form::select('author_id', array(1 => 'Author #1',2 => 'Author #2',3 => 'Author #3',4 => 'Author #4', 5 => 'Non-existent Author')) }} </li>
        @if($errors->has('author_id'))
        <li> {{ $errors->first('author_id') }}
        @endif
        <li> {{ Form::label('body') }} </li>
        <li> {{ Form::textarea('body')}} </li>
        @if($errors->has('body'))
        <li> {{ $errors->first('body') }}
        @endif
    </ul>
    {{ Form::submit() }}
{{ Form::close() }}