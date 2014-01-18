@if ($paginator->getLastPage() > 1)
<ul class="ui pagination menu">
  <a href="{{ $paginator->getUrl(1) }}"
    class="item{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}">
        <i class="icon left arrow"></i> Previous
      </a>
      @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
      <a href="{{ $paginator->getUrl($i) }}"
    class="item{{ ($paginator->getCurrentPage() == $i) ? ' active' : '' }}">
        {{ $i }}
      </a>
      @endfor
      <a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}"
    class="item{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">
        Next <i class="icon right arrow"></i>
      </a>
</ul>
@endif