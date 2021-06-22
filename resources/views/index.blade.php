@extends('layout')

@section('main-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div>
        <div class="float-start">
            <h4 class="pb-3">List of items</h4>
        </div>
        <div class="float-end" >
            <a href="{{ route('skelbimai.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> List an item
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    @foreach ($skelbimas as $skelbimai)
        <div class="list card mt-3 col-4 ">
            <h5 class="card-header">

                    {{ $skelbimai->title }}



                <span class="badge rounded-pill bg-warning text-dark">
                   Created at:  {{ $skelbimai->created_at->diffForHumans() }}
                </span>
            </h5>

            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                        <a> Category: {{$skelbimai->category}}</a>

                        <br>

                        Description: {{ $skelbimai->description }}
                        <br>

                        <span class="badge rounded-pill bg-warning text-dark">
                        <small>Last Updated - {{ $skelbimai->updated_at->diffForHumans() }} </small>

                            </span>
                    </div>


                    <div class="float-end">
                        <a href="{{ route('skelbimai.show', $skelbimai->id) }}"class="btn btn-info" >
                            <i class="fa fa-eye"></i>

                        </a>
                        <a href="{{ route('skelbimai.edit', $skelbimai->id) }}" class="btn btn-success">
                            <i class="fa fa-edit"></i>
                        </a>


                        <form action="{{ route('skelbimai.destroy', $skelbimai->id) }}" style="display: inline" method="POST" onsubmit="return confirm('Are you sure to delete ?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>

                        </form>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>


        </div>
    @endforeach

    @if (count($skelbimas) === 0)
        <div class="alert alert-danger p-2">
            No Task Found. Please Create one task
            <br>
            <br>
            <a href="{{ route('skelbimai.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Create Task
            </a>
        </div>
    @endif

@endsection
