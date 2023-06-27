@extends('/layouts/main')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="text-center">
            <h1 class="text-2xl font-bold mb-4">Create New Job</h1>

            <!-- if sucess -->
             <div id="success-message" class="hidden bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                Job created!
            </div> 

            <form id="create-job-form" class="max-w-md mx-auto">

            <!-- if error occured, loup over errors and display -->
                            <div id="error-messages" class="hidden bg-red-200 text-red-800 py-2 px-4 mb-4 rounded"></div>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" class="border border-gray-300 rounded px-3 py-2 w-full" required></textarea>
                </div>

                <button id="create-job-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                    Create Job
                </button>
            </form>
        </div>
    </div>

    <script>
        // AJAX request

        //register all elements
        const form = document.getElementById('create-job-form');
        const button = document.getElementById('create-job-button');
        const successMessage = document.getElementById('success-message');
        const errorMessages = document.getElementById('error-messages');

        //listen for button being clicked
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            button.disabled = true;
            //handle error message
            errorMessages.classList.add('hidden');

            //get title and description from the form
            const title = document.getElementById('title').value;
            const description = document.getElementById('description').value;

            //call api and try posting a job
            fetch('/job', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

                //make it string for request
                body: JSON.stringify({ title, description })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        successMessage.classList.remove('hidden');
                        form.reset();
                    } else {
                        displayErrorMessages(data.errors);
                    }
                button.disabled = false;
                })
                .catch(error => {
                displayErrorMessages(['error. Please try again.']);
                button.disabled = false; });
        });

            function displayErrorMessages(errors) {
            errorMessages.innerHTML = '';
            errors.forEach(error => {
                const errorMessage = document.createElement('p');
                errorMessage.textContent = error;
                errorMessages.appendChild(errorMessage);
            });
            errorMessages.classList.remove('hidden');
        }
    </script>
@endsection
