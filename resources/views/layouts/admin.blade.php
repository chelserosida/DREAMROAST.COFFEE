<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - DreamRoast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{
            --black: #0A0908; /* Deep Black */
            --burgundy: #49111C; /* Burgundy */
            --light: #FFFFFF; /* White */
            --taupe: #A9927D; /* Taupe */
            --brown: #5E503F; /* Brown */
        }
        body{font-family:'Poppins', Arial,Helvetica,sans-serif; background-color:var(--black); color:var(--light); font-weight:700}
        nav { background-color: var(--burgundy); }
        nav a { color: var(--light) !important; font-weight:700; text-decoration: none; }
        nav a:hover { color: var(--taupe) !important; }
        nav a.active { color: var(--taupe) !important; border-left: 3px solid var(--taupe); padding-left: 12px !important; }
        .navbar-brand, h1, h2, h3 { font-family: 'Abril Fatface', serif; }
        .greeting { font-size: 1rem; font-weight: 600; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .btn-outline-light { color: var(--light); border-color: rgba(255,255,255,0.15); }
        .btn-outline-light:hover { background-color: rgba(255,255,255,0.05); }
        .table { color: var(--light); }
        .card { background-color: rgba(73,17,28,0.2); border-color: var(--brown); color: var(--light); }
        .form-control, .form-select { background-color: rgba(255,255,255,0.05); border-color: var(--brown); color: var(--light); }
        .form-control:focus, .form-select:focus { background-color: rgba(255,255,255,0.08); border-color: var(--burgundy); color: var(--light); }
        .btn-primary { background-color: var(--burgundy); border-color: var(--burgundy); color: var(--light); }
        .btn-primary:hover { background-color: var(--brown); }
        .btn-secondary { background-color: var(--brown); border-color: var(--brown); color: var(--light); }
    </style>
</head>
<body>
    <div class="d-flex">
        <nav class="bg-dark text-white p-4" style="width:250px; min-height:100vh">
            <div class="greeting">Hallo, {{ Auth::guard('admin')->user()->name }}!</div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a class="nav-link text-white {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">Dashboard</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white {{ request()->is('admin/beans*') ? 'active' : '' }}" href="/admin/beans">Products</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white {{ request()->is('admin/orders*') ? 'active' : '' }}" href="/admin/orders">Orders</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white {{ request()->is('admin/galleries*') ? 'active' : '' }}" href="/admin/galleries">Gallery</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white {{ request()->is('admin/messages*') ? 'active' : '' }}" href="/admin/messages">Messages</a></li>
            </ul>
            <div class="mt-auto pt-4">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm w-100">Logout</button>
                </form>
            </div>
        </nav>
        <div class="p-4 flex-grow-1">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
