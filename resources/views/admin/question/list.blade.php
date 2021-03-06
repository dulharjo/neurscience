@extends('admin')

@section('content')
    <h3>Question List <br/><small>@if($clinic){{$clinic->name}}@endif</small></h3>
    <hr/>
    <div class="row">
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-expanded="true">
                    Clinic
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="width: 300px">
                    @foreach($clinics as $clinic)
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="/admin/question/list/{{$clinic->id}}">
                                {{$clinic->name}}
                                <span class="badge pull-right">{{$clinic->unAnswered()}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <hr/>
    <div class="table-responsive">
        @if (!empty($questions))
            <table class="table table-striped table-hover table-condensed table-bordered"
                   style="font-size:14px" width="50%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Penanya</th>
                    <th>Penjawab</th>
                    <th class="col-sm-2">Date</th>
                    <th class="col-sm-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>
                            <a href="/admin/question/edit/{{$question->id}}">
                                {{$question->question_title}}
                            </a>
                        </td>
                        <td>{{$question->questioner}}</td>
                        <td>{{$question->answering}}</td>
                        <td>{{$question->created_at}}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="/admin/question/edit/{{$question->id}}">
                                @if (!$question->published)
                                    Answer
                                @else
                                    Edit Answer
                                @endif
                            </a>
                            <a class="btn btn-sm btn-success" href="/admin/question/delete/{{$question->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div align="center">
                <?php echo $questions->render();?>
            </div>
        @endif
    </div>
@stop