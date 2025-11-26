<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dream Roast Coffe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
            --black: #0A0908;
            --burgundy: #49111C;
            --light: #FFFFFF;
            --taupe: #A9927D;
            --brown: #5E503F;
        }
        body{font-family:Arial,Helvetica,sans-serif; background-color:var(--black); color:var(--light)}
        .navbar { background-color: var(--burgundy) !important; }
        .nav-icon { width:18px; height:18px; }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Dream Roast Coffe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('menu') }}" title="Menu"><svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16v2H4zM4 11h16v2H4zM4 16h16v2H4z"/></svg><span class="visually-hidden">Menu</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('beans') }}" title="Roasted Beans"><svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18v2H3zM3 11h18v2H3zM3 16h18v2H3z"/></svg><span class="visually-hidden">Roasted Beans</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" title="About"><svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><rect x="11" y="10" width="2" height="6"/><rect x="11" y="7" width="2" height="2"/></svg><span class="visually-hidden">About</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}" title="Gallery"><svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 19V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14h18zM8 13l2.5 3 3.5-4.5L19 18H5l3-5z"/></svg><span class="visually-hidden">Gallery</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" title="Contact"><svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 6v12h20V6l-10 7L2 6z"/></svg><span class="visually-hidden">Contact</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
