@extends('/layouts/main')

@section('content')
  <div class="flex justify-center items-center h-screen">
        <div class="tex-center">
            <a href="{{ route('job.create') }}" class="bg-blue-500 hover:bg-blue-700 py-3 px-8 text-white font-bold text-lg rounded-full">
                   Create New Job
            </a>
            <a href="{{ route('job.index') }}" class="bg-green-500 hover:bg-green-700 py-3 px-8 text-white font-bold text-lg rounded-full">
                       View Jobs
            </a>
        </div>
    </div>
@endsection