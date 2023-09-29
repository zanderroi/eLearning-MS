{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="/student/registered">
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
                            <label for="contactperson">{{ __('Contact Person') }}</label>
                            <input id="contactperson" type="text" class="form-control" name="contactperson" value="{{ old('contactperson') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="contactperson_number">{{ __('Contact Person Number') }}</label>
                            <input id="contactperson_number" type="text" class="form-control" name="contactperson_number" value="{{ old('contactperson_number') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="grade">{{ __('Grade') }}</label>
                            <input id="grade" type="text" class="form-control" name="grade" value="{{ old('grade') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="section">{{ __('Section') }}</label>
                            <input id="section" type="text" class="form-control" name="section" value="{{ old('section') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="lrn">{{ __('LRN (Learner\'s Reference Number)') }}</label>
                            <input id="lrn" type="text" class="form-control" name="lrn" value="{{ old('lrn') }}" required>
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
{{-- @endsection --}}
