@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('questions.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('question.create') }}" class="btn btn-success" title="{{ trans('questions.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($questions) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('questions.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Options</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>

                            <td>{{ $question->label }}</td>
                            <td>{{ $question->options }}</td>
                            <td>{{ $question->answer }}</td>
                            <td>
                                <a href="{{ route('question.edit', $question->id ) }}"><i
                                        class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('question.show', $question->id ) }}"><i
                                        class="fa fa-edit"></i> Show</a>
                                <form method="POST" action="{!! route('question.destroy', $question->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('question.show', $question->id ) }}" class="btn btn-info" title="{{ trans('questions.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('question.edit', $question->id ) }}" class="btn btn-primary" title="{{ trans('questions.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('questions.delete') }}" onclick="return confirm(&quot;{{ trans('questions.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            Remove
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $questions->render() !!}
        </div>

        @endif

    </div>
@endsection
