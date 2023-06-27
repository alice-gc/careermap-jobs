@extends('/layouts/main')
      
@section('content')
   <div class="flex justify-center items-center h-screen">
        <div class="text-center">
            <h1 class="text-2xl">Job Details</h1>
            <p><strong>Title:</strong> {{ $job->title }}</p>
            <p><strong>Description:</strong> {{ $job->description }}</p>
            <p><strong>Created at:</strong> {{ $job->created_at }}</p>
            <p><strong>Updated at:</strong> {{ $job->updated_at }}</p>
        </div>
    </div>
@endsections