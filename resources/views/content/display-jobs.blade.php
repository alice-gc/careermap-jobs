@extends('/layouts/main')
  
@section('content')
   <div class="container">
        <h1 class="text-2xl font-bold mb-4">All Jobs</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($jobs as $job)
                    <tr class="cursor-pointer" style="transition-property: background-color; transition-duration: 300ms; background-color: white;" onmouseover="this.style.backgroundColor='gray';" onmouseout="this.style.backgroundColor='white';" onclick="window.location='{{ route('job.get', $job->id) }}'" >                       
                     <td class="px-6 py-4 text-xs whitespace-nowrap">{{ $job->id }}</td>
                        <td class="px-6 py-4 text-xs whitespace-nowrap">{{ $job->title }}</td>
                        <td class="px-6 py-4 text-xs whitespace-nowrap">{{ $job->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection