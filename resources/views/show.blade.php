@extends('layout')

@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Item <span class="badge bg-info">{{ $skelbimas->title }}</span></h4>
        </div>
        <div class="float-end">
            <a href="{{ route('index') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> All listed items
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="card card-body bg-light p-4">
            <div class="mb-3">
                <label for="title" class="form-label">{{ $skelbimas->title }}</label>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Category: {{$skelbimas->category}}</label>


            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description: {{ $skelbimas->description }}</label>

            </div>

            <a href="{{ route('index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Back</a>

        </form>
    </div>

@endsection
