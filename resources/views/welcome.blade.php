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
        <h3 class="display-4 mb-4">Welcome to User Feedback System!</h3>
        <p class="lead text-muted mb-5">Share your feedback and engage in discussions with amazing people.</p>

        @guest
            <a href="{{ url('/feedback') }}" class="btn btn-primary btn-lg animate__animated animate__fadeIn"> Feedbacks <i class="fas fa-arrow-right"></i></a>
        @else
            @if(!Auth::user()->isAdmin())
                <a href="{{ url('/feedback') }}" class="btn btn-primary btn-lg animate__animated animate__fadeIn">Feedbacks <i class="fas fa-arrow-right"></i></a>
            @endif
        @endguest
    </section>

    <!-- Why Choose Us Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h4 class="display-3 text-center mb-4">Why Choose Our Platform?</h4>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Intuitive Interface</h3>
                            <p class="card-text">Immerse yourself in our platform with a user-friendly interface, ensuring effortless navigation for users of all expertise levels.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Community Connection</h3>
                            <p class="card-text">Participate in lively discussions and foster a sense of community by connecting with like-minded users who share your passions.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Responsive Design</h3>
                            <p class="card-text">Experience seamless interactions on various devices, including desktops, tablets, and smartphones, thanks to our responsive design.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional Cards -->
            <div class="row">
                <!-- Card 4 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Diverse Content</h3>
                            <p class="card-text">Explore a multitude of content and topics, ensuring there's something for everyone's interests and preferences.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Real-Time Engagement</h3>
                            <p class="card-text">Participate in real-time interactions with fellow users, making discussions dynamic and lively.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Top-Notch Security</h3>
                            <p class="card-text">Rest easy with our robust security measures, ensuring the confidentiality and safety of your data.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Commitment to Excellence Section -->
    <section style="background: #555" class=" text-light py-5">
        <div class="container">
            <h2 class="display-3 text-center mb-4">Our Commitment to Excellence</h2>
            <p class="lead text-center mb-5">Discover why our platform stands out and how we are dedicated to providing an unparalleled user experience.</p>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Innovative Features</h3>
                            <p class="card-text">Explore a range of cutting-edge features designed to enhance your online experience, ensuring you stay ahead in the digital landscape.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Continuous Improvement</h3>
                            <p class="card-text">We are committed to continuous improvement, regularly updating our platform to incorporate feedback and provide you with the best possible experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Explore Endless Possibilities Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="display-3 text-center mb-4">Explore Endless Possibilities</h2>
            <p class="lead text-center mb-5">Dive into a world of limitless opportunities and discover how our platform can empower you to achieve your goals.</p>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Creative Freedom</h3>
                            <p class="card-text">Express yourself freely with creative tools that allow you to customize your profile and showcase your unique personality.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Learning Resources</h3>
                            <p class="card-text">Access a wealth of learning resources, from articles and tutorials to expert-led webinars, fostering continuous personal and professional growth.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h3 class="mb-3">Global Connections</h3>
                            <p class="card-text">Connect with individuals from around the globe, expanding your network and gaining valuable insights from diverse perspectives.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<footer style="background: #555" class=" py-4">
    <div class="container text-center">
        <p class="mb-0 text-white">©2023 All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
