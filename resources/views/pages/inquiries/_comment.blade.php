@extends('components.comment')

@section('comment.actions')

    @if(\App\Policies\IssueCommentPolicy::edit(auth()->user(), $issue, $comment))
        <a
                class="btn btn-default btn-sm"
                href="{{ route('issues.comments.edit', [$issue->id, $comment->id]) }}">
            <i class="fa fa-edit"></i>
            Edit
        </a>
    @endif

    @if(\App\Policies\IssueCommentPolicy::destroy(auth()->user(), $issue, $comment))
        <a
                class="btn btn-default btn-sm"
                data-post="DELETE"
                data-title="Delete Comment?"
                data-message="Are you sure you want to delete this comment?"
                href="{{ route('issues.comments.destroy', [$issue->id, $comment->id]) }}">
            <i class="fa fa-times"></i>
            Delete
        </a>
    @endif

@overwrite
