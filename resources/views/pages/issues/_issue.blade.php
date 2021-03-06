@extends('components.card')

@section('card.type') card-primary @overwrite

@section('card.id'){{ "issue-$issue->id" }}@overwrite

@section('card.title')

    <div class="card-title col-md-12">

        <h4>

            <span class="text-muted">{{ $issue->hash_id }}</span>

            {{ $issue->title }}

            <span class="pull-right text-muted">
                <i class="fa fa-ticket"></i>
            </span>

        </h4>

    </div>

@overwrite

@section('card.heading')

    <img class="hidden-xs avatar" src="{{ route('profile.avatar.download', [$issue->user->id]) }}" alt="{{ $issue->user->name }}'s Profile Avatar"/>

    <div class="card-heading-header">

        <h3>{{ $issue->user->name }}</h3>

        <span>

            Created

            <a title="{{ $issue->created_at }}">
                {{ $issue->created_at_human }}
            </a>

            @if($issue->revisions->count() > 0)

                - Edited

                <a title="{{ $issue->revisions->first()->created_at }}">
                    {{ $issue->revisions->first()->created_at_human }}
                </a>

            @endif

            @if ($issue->occurred_at)

                - Occurred

                <a title="{{ $issue->occurred_at }}">
                    {{ $issue->occurred_at_human }}
                </a>

            @endif

        </span>

    </div>

@overwrite

@section('card.body')

    <p>
        {!! $issue->description_from_markdown !!}
    </p>

    <!-- Attachments -->
    <div class="row">

        <div class="col-md-12">

            <div class="hidden-print">
                @include('pages.issues._files')
            </div>

        </div>

    </div>

    {{--
     We'll make sure a resolution exists and that we have more than
     one comment before display the resolution here.
     --}}
    @if(isset($resolution) && count($issue->comments) > 1)

        {{-- We'll also make sure that the first comment is not a resolution. --}}
        @if(!$issue->comments->first()->resolution)

            <!-- Resolution -->
            <div class="row">

                <div class="col-md-12">

                @include('pages.issues._resolution', ['comment' => $resolution])

                </div>

            </div>

        @endif

    @endif

@overwrite

@section('card.actions')

    <div class="hidden-print">

        @can('issues.edit', [$issue])

            <a
                    class="btn btn-default btn-sm"
                    href="{{ route('issues.edit', [$issue->id]) }}">
                <i class="fa fa-edit"></i>
                Edit
            </a>

        @endcan

        @can('issues.destroy', [$issue])

            <a
                    class="btn btn-default btn-sm"
                    data-post="DELETE"
                    data-title="Delete Ticket?"
                    data-message="Are you sure you want to delete this ticket?"
                    href="{{ route('issues.destroy', [$issue->id]) }}">
                <i class="fa fa-times"></i>
                Delete
            </a>

        @endcan

        @include('pages.issues._form-labels')

        @include('pages.issues._form-users')

    </div>

@overwrite
