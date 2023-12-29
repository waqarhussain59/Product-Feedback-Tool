@include('layouts.mater')
<body class="antialiased">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
{{--        <a class="navbar-brand" href="#">Home</a>--}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/feedback') }}">FeedBacks</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <section class="py-5 text-center">
        <h1 class="display-4 mb-4">Welcome to User Feedback System!</h1>
        <p class="lead text-muted mb-5">Share your feedbacks and engage in discussions amazing people.</p>

        @guest
            <a href="{{ url('/feedback') }}" class="btn btn-primary btn-lg animate__animated animate__fadeIn"> Feedbacks<i class="fas fa-arrow-right"></i></a>
        @else
            @if(!Auth::user()->isAdmin())
                <a href="{{ url('/feedback') }}" class="btn btn-primary btn-lg animate__animated animate__fadeIn">Feedbacks <i class="fas fa-arrow-right"></i></a>
            @endif
        @endguest
    </section>

    <!-- The rest of your navigation menu goes here -->



    <section class="bg-light py-5">
        <div class="container">
            <h2 class="display-3 text-center mb-4">Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Intuitive Interface</h3>
                            <p class="card-text">Experience our platform with an intuitive interface, making navigation a breeze for users of all levels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Community Engagement</h3>
                            <p class="card-text">Join vibrant discussions and foster a sense of community by connecting with other users who share your passions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Adaptive Design</h3>
                            <p class="card-text">Enjoy a seamless experience across various devices, including desktops, tablets, and smartphones, thanks to our adaptive design.</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Cards -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Content Variety</h3>
                            <p class="card-text">Explore diverse content and topics, ensuring there's something for everyone's interests and preferences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Real-Time Interaction</h3>
                            <p class="card-text">Engage in real-time interactions with fellow users, making discussions more dynamic and lively.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Robust Security</h3>
                            <p class="card-text">Rest easy with our robust security measures, ensuring the confidentiality and safety of your data.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 text-center">
        <h2 class="display-3 mb-4">Join Us Today!</h2>
        <p class="lead text-muted mb-5">Sign up now to start sharing your thoughts and connecting with a community of like-minded individuals.</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg animate__animated animate__fadeIn">Register Now <i class="fas fa-arrow-right"></i></a>
    </section>
</div>

<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p class="mb-0">©2024 All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
