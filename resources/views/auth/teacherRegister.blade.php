{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Register</title>
    <link rel="icon" href="{{ asset('images/brightsparkslogo.png') }}" type="image/x-icon">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/57a798c9bb.js" crossorigin="anonymous"></script>

</head>
<body class="bg-gray-100 font-family-karla h-screen">
    <x-navbar />

    <x-footer />
</body>
</html> --}}



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teacher Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="/teacher/registered">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="middleName">{{ __('Middle Name') }}</label>
                            <input id="middleName" type="text" class="form-control" name="middleName" value="{{ old('middleName') }}" autocomplete="middleName">
                        </div>

                        <div class="form-group">
                            <label for="lastName">{{ __('Last Name') }}</label>
                            <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName">
                        </div>

                        <div class="form-group">
                            <label for="sex">{{ __('Sex') }}</label>
                            <select id="sex" class="form-control" name="sex" required>
                                <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="birthday">{{ __('Birthday') }}</label>
                            <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>

                        <div class="form-group">
                            <label for="contact_number">{{ __('Contact Number') }}</label>
                            <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ old('contact_number') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="id_number">{{ __('ID Number') }}</label>
                            <input id="id_number" type="text" class="form-control" name="id_number" value="{{ old('id_number') }}" required>
                        </div>

                        {{-- <div class="form-group">
                            <label for="subject">{{ __('Subject') }}</label>
                            <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required>
                        </div> --}}

                        <div class="form-group">
                            <label>{{ __('Subject') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="subject[]" placeholder="Enter a subject" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="add-subject">Add Subject</button>
                                </div>
                            </div>
                            <div id="subject-fields"></div>
                        </div>

                        <div class="form-group">
                            <label for="department">{{ __('Department') }}</label>
                            <input id="department" type="text" class="form-control" name="department" value="{{ old('department') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="program">{{ __('Program') }}</label>
                            <select id="program" class="form-control" name="program" required>
                                <option value="kinder" {{ old('program') == 'kinder' ? 'selected' : '' }}>Kinder</option>
                                <option value="elementary" {{ old('program') == 'elementary' ? 'selected' : '' }}>Elementary</option>
                                {{-- <option value="high_school" {{ old('program') == 'high_school' ? 'selected' : '' }}>High School</option> --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="advisory_year">{{ __('Advisory Year') }}</label>
                            <input id="advisory_year" type="number" class="form-control" name="advisory_year" value="{{ old('advisory_year') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="advisory_section">{{ __('Advisory Section') }}</label>
                            <input id="advisory_section" type="text" class="form-control" name="advisory_section" value="{{ old('advisory_section') }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    var maxSubjects = 4; // Maximum number of subjects allowed
    var subjectFields = document.getElementById('subject-fields');

    // Add Subject button click event
    document.getElementById('add-subject').addEventListener('click', function () {
        if (subjectFields.children.length < maxSubjects) {
            var inputGroup = document.createElement('div');
            inputGroup.className = 'input-group mt-2';
            inputGroup.innerHTML = `
                <input type="text" class="form-control" name="subject[]" placeholder="Enter a subject" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-subject">Remove</button>
                </div>
            `;
            subjectFields.appendChild(inputGroup);

            // Remove Subject button click event
            inputGroup.querySelector('.remove-subject').addEventListener('click', function () {
                subjectFields.removeChild(inputGroup);
            });
        } else {
            alert('You can add a maximum of ' + maxSubjects + ' subject.');
        }
    });
</script>


{{-- <script>
    // Add Subject button click event
    document.getElementById('add-subject').addEventListener('click', function () {
        var subjectFields = document.getElementById('subject-fields');
        var inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mt-2';
        inputGroup.innerHTML = `
            <input type="text" class="form-control" name="subjects[]" placeholder="Enter a subject" required>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-subject">Remove</button>
            </div>
        `;
        subjectFields.appendChild(inputGroup);
        
        // Remove Subject button click event
        inputGroup.querySelector('.remove-subject').addEventListener('click', function () {
            subjectFields.removeChild(inputGroup);
        });
    });
</script> --}}
{{-- @endsection --}}
