<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini CRM</title>
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #e5e5e5;
  color: #333;
  font-family: Arial, sans-serif;
  padding: 20px;
}

.container {
  max-width: 900px;
  margin: 20px auto;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 5px;
}

nav {
  background-color: #3498db;
  color: #ffffff;
  padding: 10px;
  margin-bottom: 20px;
  text-align: center;
}

.nav-main{
    background-color: #56c3a4;
}

.nav-brand {
  font-size: 20px;
  font-weight: bold;
}

a {
  color: #007bff;
  text-decoration: none;
  padding: 5px 10px;
  display: inline-block;
  margin: 5px;
}

a.register-link,
a.login-link {
  color: #ffffff;
  background-color: #007bff;
  padding: 10px 20px;
  border-radius: 5px;
}

a:hover,
a.register-link:hover,
a.login-link:hover {
  background-color: #0056b3;
}

h1, h2 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

form {
  margin-bottom: 20px;
  padding: 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 10px;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

ul {
  list-style: none;
  padding: 0;
}

ul li {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  color: #007bff;
  margin-bottom: 5px;
}
</style>
</head>
<body>
    <nav class="nav-main">
        @guest
            <span class="nav-brand">Mini-CRM App</span>
            <a href="{{ url()->previous() ?: route('home') }}" class="nav-button">Back</a>
            <a href="{{ route('register') }}" class="register-link">Register</a>
            <a href="{{ route('login') }}" class="login-link">Login</a>
        @else
            <span class="nav-brand">Mini-CRM App</span>
            <div class="nav-right">
                <span class="user-name">Welcome, {{ Auth::user()->name }}</span>
                <a href="{{ url()->previous() ?: route('home') }}" class="nav-button">Back</a>
                <a href="{{ route('clients.index') }}" class="nav-button">Clients</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="nav-button">Logout</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
