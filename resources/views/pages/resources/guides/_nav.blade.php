<ul class="nav navbar-left navbar-nav">
    <li class="{{ active()->route('resources.guides.index') }}">
        <a href="{{ route('resources.guides.index') }}">
            All Guides
        </a>
    </li>
    <li><a href="{{ route('resources.guides.create') }}"><i class="fa fa-plus"></i> New Guide</a></li>
</ul>

@include('pages.issues._search')