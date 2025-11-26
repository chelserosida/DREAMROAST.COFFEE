<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - DreamRoast Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #0A0908;
            --burgundy: #49111C;
            --light: #F5F5F5;
            --taupe: #A9927D;
            --brown: #5E503F;
            --orange-accent: #8B5A3C;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--black) 0%, var(--burgundy) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container {
            display: flex;
            background: white;
            border-radius: 0;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            max-width: 800px;
            width: 100%;
            height: 500px;
        }
        .login-sidebar {
            flex: 0 0 280px;
            background: linear-gradient(180deg, var(--burgundy) 0%, var(--black) 100%);
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .sidebar-nav {
            position: absolute;
            top: 40px;
            left: 30px;
            right: 30px;
            display: flex;
            justify-content: space-between;
        }
        .nav-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 0.9rem;
            opacity: 0.8;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .nav-item:hover {
            opacity: 1;
        }
        .nav-icon {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .nav-icon::after {
            content: '✓';
            font-size: 10px;
        }
        .sidebar-logo {
            text-align: center;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .sidebar-logo img {
            max-width: 200px;
            border-radius: 15px;
            margin-bottom: 40px;
        }
        .login-tabs {
            display: flex;
            gap: 10px;
            width: 100%;
        }
        .tab-btn {
            flex: 1;
            padding: 10px 20px;
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
            font-size: 0.85rem;
        }
        .tab-btn.active {
            background: white;
            color: var(--burgundy);
        }
        .login-form {
            flex: 1;
            padding: 60px 50px;
            background: #2C2C2C;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-logo {
            text-align: center;
            margin-bottom: 40px;
        }
        .logo-circles {
            display: flex;
            justify-content: center;
            gap: -10px;
            margin-bottom: 20px;
        }
        .circle {
            width: 60px;
            height: 60px;
            border: 4px solid var(--taupe);
            border-radius: 50%;
            opacity: 0.7;
        }
        .circle:nth-child(2) {
            margin-left: -20px;
            opacity: 0.85;
        }
        .circle:nth-child(3) {
            margin-left: -20px;
            opacity: 1;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-control {
            border: none;
            border-bottom: 1px solid #555;
            border-radius: 0;
            padding: 12px 40px 12px 5px;
            font-size: 0.9rem;
            transition: border-color 0.3s;
            background: transparent;
            color: #ccc;
        }
        .form-control:focus {
            box-shadow: none;
            border-bottom-color: var(--taupe);
            background: transparent;
            color: white;
        }
        .form-control::placeholder {
            color: #777;
        }
        .input-icon {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
            width: 16px;
            height: 16px;
        }
        .input-wrapper {
            position: relative;
            padding-left: 25px;
        }
        .btn-submit {
            background: var(--taupe);
            border: none;
            padding: 12px;
            border-radius: 25px;
            color: var(--black);
            font-weight: 600;
            width: 100%;
            margin-top: 15px;
            transition: all 0.3s;
        }
        .btn-submit:hover {
            background: #9d8269;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(169,146,125,0.3);
        }
        .divider {
            text-align: center;
            color: #999;
            font-size: 0.8rem;
            margin: 20px 0;
        }
        @media (max-width: 768px) {
            .login-sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-sidebar">
            <div class="sidebar-nav">
                <div class="nav-item" onclick="window.location.href='{{ route('home') }}'">
                    <span class="nav-icon"></span>
                    <span>Home</span>
                </div>
                <div class="nav-item" onclick="window.location.href='{{ route('contact') }}'">
                    <span class="nav-icon"></span>
                    <span>Contacts</span>
                </div>
            </div>
            
            <div class="sidebar-logo">
                <img src="/images/logo.jpg" alt="DreamRoast Coffee">
                <div class="login-tabs">
                    <button class="tab-btn" onclick="window.location.href='{{ route('admin.login') }}'">Login</button>
                    <button class="tab-btn active">Sign up</button>
                </div>
            </div>
        </div>
        
        <div class="login-form">
            <div class="form-logo">
                <div class="logo-circles">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </div>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('admin.register.post') }}">
                @csrf
                <div class="form-group">
                    <div class="input-wrapper">
                        <svg class="input-icon" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-wrapper">
                        <svg class="input-icon" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
                        </svg>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-wrapper">
                        <svg class="input-icon" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-submit">Get started</button>
            </form>
        </div>
    </div>
</body>
</html>
