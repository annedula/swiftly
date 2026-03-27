<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiftly</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Fix toggle visibility */
        [data-theme="dark"] .btn-toggle {
            color: #fff;
            border: 1px solid #444;
            background: transparent;
        }

        [data-theme="light"] .btn-toggle {
            color: #000;
            border: 1px solid #ccc;
            background: #fff;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg px-4 py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="navbar-brand fw-bold">Swiftly</span>

        <button id="theme-toggle" class="btn btn-toggle">
            🌙
        </button>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero d-flex align-items-center" style="min-height: 90vh;">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-7">

                <h1 class="fw-bold display-4 mb-3" data-aos="fade-right">
                    Organize Your Day.<br>
                    <span style="color: var(--accent);">Stay Focused.</span>
                </h1>

                <p class="text-muted mb-4" data-aos="fade-up" data-aos-delay="200">
                    A minimal, distraction-free task manager designed to help you stay productive and in control.
                </p>

                <a href="{{ route('tasks.index') }}" 
                   class="btn btn-custom btn-lg"
                   data-aos="zoom-in"
                   data-aos-delay="400">
                    Get Started
                </a>

            </div>

            <div class="col-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                <div class="card p-4 text-center">
                    <h5 class="fw-bold mb-3">Why Swiftly?</h5>
                    <p class="text-muted small">
                        Clean UI • Fast Workflow • Focus-Driven Design
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 800,
        once: true
    });

    const toggleBtn = document.getElementById('theme-toggle');
    const html = document.documentElement;

    function updateIcon(theme) {
        toggleBtn.textContent = theme === 'dark' ? '☀️' : '🌙';
    }

    toggleBtn.addEventListener('click', () => {
        const current = html.getAttribute('data-theme');
        const next = current === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
        updateIcon(next);
    });

    // Load saved theme
    const savedTheme = localStorage.getItem('theme') || 'dark';
    html.setAttribute('data-theme', savedTheme);
    updateIcon(savedTheme);
</script>

</body>
<script>
    <script>
    const toggleBtn = document.getElementById('theme-toggle');
    const html = document.documentElement;

    function applyTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        toggleBtn.textContent = theme === 'dark' ? '☀️ Light' : '🌙 Dark';
    }

    // Load theme FIRST
    const savedTheme = localStorage.getItem('theme') || 'dark';
    applyTheme(savedTheme);

    toggleBtn.addEventListener('click', () => {
        const current = html.getAttribute('data-theme');
        applyTheme(current === 'dark' ? 'light' : 'dark');
    });
</script>
</script>
</html>