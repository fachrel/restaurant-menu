<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/choices.js/choices.css')}}" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="{{asset('mazer/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/simple-datatables/style.css')}}">

    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="preload" href="{{asset('mazer/assets/css/app.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">

    @yield('styles')
    <style>
        .flash-message {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 350px;
            z-index: 9999;
        }
    </style>
    <link rel="shortcut icon" href="{{asset('mazer/assets/images/favicon.ico')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <x-sidebar />
        <div id="main" class='layout-navbar'>
            <div class="container-xl">

                <x-header />
                <div id="main-content">
                    <x-server.alert />
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-6 order-md-1 order-last">
                                    <h3>Vertical Layout with Navbar</h3>
                                    <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p>
                                </div>
                                <div class="col-12 col-md-6 order-md-2 order-first">
                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <section class="section">
                                @yield('content')
                        </section>
                    </div>

                    <footer>
                        <div class="footer clearfix mb-0 text-muted">
                            <div class="float-start">
                                <p>2024 &copy; razka.dev</p>
                            </div>
                            <div class="float-end">
                                <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                    by <a href="https://razka.dev">Razka</a> X <a href="https://evinovita.my.id">Evi</a></p>
                            </div>
                        </div>
                    </footer>
                </div>  
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var flashMessage = document.querySelector('.flash-message');
            if (!flashMessage) return;
        
            var displayDuration = 2500; // in milliseconds
            var fadeDuration = 500; // fade out time in milliseconds
            var remainingTime = displayDuration;
            var timer;
        
            // Create Bootstrap progress bar
            var progressBarContainer = document.createElement('div');
            progressBarContainer.className = 'progress';
            progressBarContainer.style.position = 'absolute';
            progressBarContainer.style.bottom = '0';
            progressBarContainer.style.left = '0';
            progressBarContainer.style.width = '100%';
            progressBarContainer.style.height = '5px';
        
            var progressBar = document.createElement('div');
            progressBar.className = 'progress-bar';
            progressBar.style.width = '100%';
            progressBar.style.backgroundColor = 'rgba(0, 0, 0, 0.8)'; // White with 80% opacity

            progressBarContainer.appendChild(progressBar);
            flashMessage.appendChild(progressBarContainer);
        
            function startTimer() {
                timer = setInterval(function() {
                    remainingTime -= 100;
                    var progress = (remainingTime / displayDuration) * 100;
                    progressBar.style.width = progress + '%';
        
                    if (remainingTime <= 0) {
                        clearInterval(timer);
                        flashMessage.style.transition = 'opacity 0.5s ease';
                        flashMessage.style.opacity = '0';
                        setTimeout(function() {
                            flashMessage.style.display = 'none';
                        }, fadeDuration);
                    }
                }, 100); // Update every 100ms for smoother animation
            }
        
            // Start the countdown initially
            startTimer();
        
            // Pause the timer on hover
            flashMessage.addEventListener('mouseenter', function() {
                clearInterval(timer);
            });
        
            // Resume the timer when no longer hovering
            flashMessage.addEventListener('mouseleave', function() {
                startTimer();
            });
        });
        </script>
    <script src="{{ asset('mazer/assets/js/main.js') }}">
    <script src="{{ asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
</body>

</html>