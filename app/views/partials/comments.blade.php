@if(count($post->comments))
<div class="comments">
@foreach($post->comments as $c)
	<div data-id="{{ $c->id }}">
			<div class="content">{{ $c->content }}</div>
			<div class="author">{{ $c->name }}</div>
			<div class="datetime">{{ $c->created_at }}</div>
	</div>
@endforeach
</div>
@endif

<div>
{{ Form::open(['route' => 'comments.store', 'class' => 'comment-form']) }}

{{ Form::text('name', null, ['placeholder' => 'name']) }}
{{ Form::text('email', null, ['placeholder' => 'email']) }}
{{ Form::text('website', null, ['placeholder' => 'website']) }}
{{ Form::hidden('content', null, ['id' => 'model-content']) }}
{{ Form::submit('create') }}

{{ Form::close() }}
</div>