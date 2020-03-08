@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="">
                            {{$thread->creator->name}}
                        </a>
                        Created
                        {{$thread->title}}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                         {{$thread->body}}

                    </div>
                </div>
            </div>
        </div>
        <br>
        @foreach($thread->replies as $reply)
          @include('threads.reply')
        @endforeach
        <br>
       @if(auth()->check())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="post" action="{{$thread->path() . '/replies'}}">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="" cols="30" rows="10" placeholder="Reply to Thread" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Reply</button>
                    </form>
                </div>
            </div>
        </div>
           @endif
        <p class="text-md-center">Please <a href="{{route('login')}}">Sign in</a> To Reply The Thread</p>
        </div>


@endsection
