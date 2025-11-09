

@php
session_start();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    body {
        display: flex;
        min-height: 100vh;
        background-color: #f4f4f9;
    }


    .sidebar {
        width: 220px;
        background-color: #2c3e50;
        color: #fff;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 40px;
        font-size: 22px;
        letter-spacing: 1px;
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
        padding: 12px 15px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .sidebar a:hover {
        background-color: #34495e;
    }

  
    .main-area {
        flex: 1;
        display: flex;
        flex-direction: column;
    }


    .topbar {
        height: 60px;
        background-color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 30px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .topbar h1 {
        font-size: 22px;
        color: #333;
    }

    .topbar .user-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .topbar .user-info img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .topbar .user-info .bell {
        font-size: 22px;
        cursor: pointer;
        position: relative;
    }

    .topbar .user-info .bell::after {
        content: "";
        width: 10px;
        height: 10px;
        background-color: red;
        border-radius: 50%;
        position: absolute;
        top: 0;
        right: 0;
    }

   
    .main-content {
        padding: 30px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 200px);
        gap: 20px;
        background-color: #f4f4f9;
        flex: 1;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        margin-bottom: 15px;
        font-size: 20px;
        color: #333;
    }

    .card p {
        color: #555;
        font-size: 16px;
    }

 
    @media (max-width: 768px) {
        body {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            flex-direction: row;
            overflow-x: auto;
        }

        .sidebar a {
            margin-right: 15px;
        }

        .topbar {
            padding: 0 15px;
        }

        .main-content {
            grid-template-columns: 1fr;
            grid-template-rows: repeat(4, 200px);
            padding: 15px;
        }
    }
</style>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <h2>My Learning</h2>
    <a href="#">Dashboard</a>
    <a href="#">Course Progress</a>
    <a href="#">Profile</a>
    <a href="{{route('logout')}}">Logout</a>
</div>

<div class="main-area">
    <div class="topbar">
        <h1>Dear, {{ session('user')->fname }}</h1>
        <div class="user-info">
            <span class="material-icons bell">notifications</span>
       <img src="{{ asset('img/student.jpg') }}" alt="Profile Photo" 
     style="width:40px; height:40px; border-radius:50%; object-fit:cover;">


        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <h3>Continue Learning</h3>
            <p>Resume your last course here.</p>
        </div>
        <div class="card">
            <h3>Upcoming Courses</h3>
            <p>Check your upcoming schedule.</p>
        </div>
        <div class="card">
            <h3>Recommended for You</h3>
            <p>Courses suggested based on your interest.</p>
        </div>
        <div class="card">
            <h3>Progress</h3>
            <p>View your learning progress.</p>
        </div>
    </div>
</div>

</body>
</html>