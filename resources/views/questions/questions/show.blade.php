@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($question->label) ? $question->label : 'Question' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('question.destroy', $question->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('question.index') }}" class="btn btn-primary" title="{{ trans('questions.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('question.create') }}" class="btn btn-success" title="{{ trans('questions.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('question.edit', $question->id ) }}" class="btn btn-primary" title="{{ trans('questions.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('questions.delete') }}" onclick="return confirm(&quot;{{ trans('questions.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('questions.label') }}</dt>
            <dd>{{ $question->label }}</dd>
            <dt>{{ trans('questions.answer') }}</dt>
            <dd>{{ $question->answer }}</dd>
            <dt>{{ trans('questions.options') }}</dt>
            <dd>{{ $question->options }}</dd>
            <dt>{{ trans('questions.created_at') }}</dt>
            <dd>{{ $question->created_at }}</dd>
            <dt>{{ trans('questions.updated_at') }}</dt>
            <dd>{{ $question->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
