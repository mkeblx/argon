@if(count($post->tags))
<div class="tags">
@foreach($post->tags as $tag)
	<span><a href="{{ route('tags.show', $tag->slug) }}">{{ '#'.$tag->name }}</a></span>
@endforeach
</div>
@endif