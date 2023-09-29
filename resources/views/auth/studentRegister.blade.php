<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register</title>
    <link rel="icon" href="{{ asset('images/brightsparkslogo.png') }}" type="image/x-icon">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/57a798c9bb.js" crossorigin="anonymous"></script>
    @section('scripts')
        <script src="{{ asset('js/wizardform.js') }}"></script>
    @show

    <style>
        #scroll-to-next {
            animation: fadeInDown 2s ease-in-out infinite;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            50% {
                opacity: 1;
                transform: translateY(10px);
            }

            100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        /* Scale effect on hover */
        .hover-scale:hover {
            transform: scale(1.05);
            transition: all 0.2s ease-in-out;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;
        }

        .step-indicator-item {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background-color: #CBD5E0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #4A5568;
        }

        .step-indicator-item.active {
            background-color: rgb(28 100 242);
            color: white;
        }

        .stepline-indicator-item {
            height: 5px;
            background-color: #2B6CB0;
        }

        .border-red-500 {
            border-color: red !important;
        }
    </style>

</head>

<body class="bg-gray-100 font-family-karla h-screen">
    <x-navbar />
    <!--Container-->
    <div class="flex flex-col mx-auto py-12 sm:px-6 lg:px-8" style="min-height: 100vh;">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-center text-3xl font-bold text-gray-900 mt-8 pt-8">Register your account</h2>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="step-indicator mb-4">
                    <div class="step-indicator-item active">1</div>
                    <hr class="font-bold stepline-indicator-item active" style="width: 50px;">
                    <div class="step-indicator-item">2</div>
                    <hr class="font-bold stepline-indicator-item active" style="width: 50px;">
                    <div class="step-indicator-item">3</div>
                </div>

                <form method="POST"  action="{{ route('student.register.submit') }}" id="wizard-form" enctype="multipart/form-data">
                @csrf
                <!-- Step 1: Personal Information -->
                <div class="step" id="step-1">
                    <h3 class="text-lg font-semibold mb-2 text-blue-600"> Personal Details </h1>
                        <div class="flex mb-2">
                            <div class="w-1/2 mr-1">

                                <label class="block text-sm font-medium text-gray-700" for="name">First
                                    Name</label>
                                <input name="name"
                                    class="@error('name') is-invalid @enderror border rounded w-full py-2 px-3 text-grey-darker"
                                    id="name" name="name" value="{{ old('name') }}" type="text" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-1/2 mr-1">

                                <label class="block text-sm font-medium text-gray-700" for="middleName">Middle
                                    Name</label>
                                <input name="middleName"
                                    class="@error('middleName') is-invalid @enderror border rounded w-full py-2 px-3 text-grey-darker"
                                    id="middleName" value="{{ old('middleName') }}" type="text" autofocus>
                                @error('middleName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-1">
                                <label class="block text-sm font-medium text-gray-700" for="last_name">Last Name</label>
                                <input
                                    name="lastName"class="@error('lastName') is-invalid @enderror border rounded w-full py-2 px-3 text-grey-darker"
                                    id="lastName" name="lastName" value="{{ old('lastName') }}" type="text" autofocus>
                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <label class="block text-sm font-medium text-gray-700" for="address">Address</label>
                        <input name="address"
                            class="@error('address') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                            value="{{ old('address') }}" id="address" type="text">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="flex mb-2">
                            <div class="w-1/2 mr-1">
                                <label class="block text-sm font-medium text-gray-700" for="phone_number">Phone
                                    Number</label>
                                <input name="phone_number"
                                    class="@error('phone_number') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                                    id="phone_number" type="number" inputmode="numeric" pattern="[0-9]*"
                                    placeholder="639" required autocomplete="phone_number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2 ml-1">
                                <label class="block text-sm font-medium text-gray-700" for="birthday">Birthday</label>
                                <input name="birthday" id="birthday" type="date"
                                    class="border rounded w-full py-2 px-3 text-grey-darker @error('birthday') is-invalid @enderror"
                                    name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex mb-2">
                            <div class="w-1/2 mr-1">
                                <label class="block text-sm font-medium text-gray-700"
                                    for="contactperson">Contact Person</label>
                                <input name="contactperson"
                                    class="@error('contactperson') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                                    id="contactperson" value="{{ old('contactperson') }}" type="text" required
                                    autocomplete="contactperson" autofocus>
                                @error('contactperson')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2 ml-1">
                                <label class="block text-sm font-medium text-gray-700"
                                    for="contactperson_number">Contact Person's Number</label>
                                <input
                                    name="contactperson_number"class="@error('contactperson_number') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                                    value="{{ old('contactperson_number') }}" id="contacperson_number"
                                    type="number" inputmode="numeric" pattern="[0-9]*" placeholder="639"
                                    value="639" required autocomplete="contactperson_number" autofocus>
                                @error('contactperson_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <button type="button" onclick="nextStep(1)"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-indigo-700 focus:ring-indigo-500 active:bg-indigo-700 disabled:opacity-25 transition ease-in-out duration-150">
                                Next
                            </button>
                        </div>
                </div>

                <!-- Step 2: Additional Information -->
                <div class="step hidden" id="step-2">
                    <h3 class="text-lg font-semibold mb-2 text-blue-600"> Account Details </h1>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700" for="email">Email
                                Address</label>
                            <input name="email"
                                class="@error('email') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                                id="email" type="email" value="{{ old('email') }}"
                                placeholder="Your email address" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="flex mb-2">
                            <div class="w-1/2 mr-1">
                                <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                                <input name="password"
                                    class="@error('password') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                                    id="password" type="password" placeholder="At least 8 characters" required
                                    autocomplete="new-password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2 ml-1">
                                <label class="block text-sm font-medium text-gray-700" for="password-confirm">Confirm
                                    Password</label>
                                <input
                                    name="password_confirmation"class=" border rounded w-full py-2 px-3 text-grey-darker"
                                    id="password-confirm" type="password" placeholder="Your secure password" required
                                    autocomplete="new-password">
                            </div>

                        </div>

                        <div class="mt-4 flex justify-between">
                            <button type="button" onclick="prevStep(2)"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 focus:outline-none focus:border-gray-300 focus:ring-gray-300 active:bg-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Previous
                            </button>
                            <button type="button" onclick="nextStep(2)"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-indigo-700 focus:ring-indigo-500 active:bg-indigo-700 disabled:opacity-25 transition ease-in-out duration-150">
                                Next
                            </button>
                        </div>
                </div>

                <!-- Step 3: Confirmation -->
                <div class="step hidden" id="step-3">
                    <h3 class="text-lg font-semibold mb-2 text-blue-600"> Student Information </h1>
                        <div class="flex mb-2">
                            <div class="w-1/2 mr-1">
                                <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                                <select id="grade" name="grade" class=" border rounded w-full py-2 px-3 text-grey-darker">
                                    <option value=""></option>
                                    <option value="Kinder">Kinder</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 2 </option>
                                    <option value="Grade 3">Grade 3</option>
                                    <option value="Grade 4">Grade 4</option>
                                    <option value="Grade 5">Grade 5</option>
                                    <option value="Grade 6">Grade 6</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                </select>
                            </div>

                            <div class="w-1/2 mr-1">
                                <label class="block text-sm font-medium text-gray-700"
                                    for="section">Section</label>
                                <input name="section"
                                    class="@error('section') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                                    id="section" value="{{ old('section') }}" type="text" required
                                    autocomplete="section" autofocus>
                                @error('section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
               
                        </div>

                        <div class="w-full mr-1">
                            <label class="block text-sm font-medium text-gray-700"
                                for="lrn">Learner's Reference Number</label>
                            <input name="lrn"
                                class="@error('lrn') is-invalid @enderror  border rounded w-full py-2 px-3 text-grey-darker"
                                id="lrn" value="{{ old('lrn') }}" type="text" required
                                autocomplete="lrn" autofocus>
                            @error('lrn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                
                    
                        <div class="mt-4 flex justify-between">
                            <button type="button" onclick="prevStep(3)"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 focus:outline-none focus:border-gray-300 focus:ring-gray-300 active:bg-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Previous
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-indigo-700 focus:ring-indigo-500 active:bg-indigo-700 disabled:opacity-25 transition ease-in-out duration-150">
                                Sign Up
                            </button>
                        </form>

                        </div>
                </div>

            </div>
        </div>
    </div>
    <!--/container-->

    <!-- Toggle dropdown list -->
    {{-- <script>
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var userMenuDiv = document.getElementById("userMenu");
        var userMenu = document.getElementById("userButton");

        var helpMenuDiv = document.getElementById("menu-content");
        var helpMenu = document.getElementById("menu-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //User Menu
            if (!checkParent(target, userMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, userMenu)) {
                    // click on the link
                    if (userMenuDiv.classList.contains("invisible")) {
                        userMenuDiv.classList.remove("invisible");
                    } else {
                        userMenuDiv.classList.add("invisible");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    userMenuDiv.classList.add("invisible");
                }
            }

            //Help Menu
            if (!checkParent(target, helpMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, helpMenu)) {
                    // click on the link
                    if (helpMenuDiv.classList.contains("hidden")) {
                        helpMenuDiv.classList.remove("hidden");
                    } else {
                        helpMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    helpMenuDiv.classList.add("hidden");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Scroll Spy -->
    <script>
        /* http://jsfiddle.net/LwLBx/ */

        // Cache selectors
        var lastId,
            topMenu = $("#menu-content"),
            topMenuHeight = topMenu.outerHeight() + 175,
            // All list items
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function() {
                var item = $($(this).attr("href"));
                if (item.length) {
                    return item;
                }
            });

        // Bind click handler to menu items
        // so we can get a fancy scroll animation
        menuItems.click(function(e) {
            var href = $(this).attr("href"),
                offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
            $('html, body').stop().animate({
                scrollTop: offsetTop
            }, 300);
            if (!helpMenuDiv.classList.contains("hidden")) {
                helpMenuDiv.classList.add("hidden");
            }
            e.preventDefault();
        });

        // Bind to scroll
        $(window).scroll(function() {
            // Get container scroll position
            var fromTop = $(this).scrollTop() + topMenuHeight;

            // Get id of current scroll item
            var cur = scrollItems.map(function() {
                if ($(this).offset().top < fromTop)
                    return this;
            });
            // Get the id of the current element
            cur = cur[cur.length - 1];
            var id = cur && cur.length ? cur[0].id : "";

            if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems
                    .parent().removeClass("font-bold border-yellow-600")
                    .end().filter("[href='#" + id + "']").parent().addClass("font-bold border-yellow-600");
            }
        });
    </script> --}}
    <x-footer />
</body>

</html>
