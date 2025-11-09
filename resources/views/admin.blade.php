<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background: var(--bg);
      color: var(--text);
      transition: background 0.3s ease, color 0.3s ease;
    }

    :root {
      --bg: #f4f5fa;
      --text: #1e293b;
      --sidebar-bg: #1e293b;
      --sidebar-text: #ffffff;
      --card-bg: #ffffff;
      --shadow: rgba(0, 0, 0, 0.1);
    }

    body.dark {
      --bg: #0f172a;
      --text: #e2e8f0;
      --sidebar-bg: #0b1320;
      --sidebar-text: #94a3b8;
      --card-bg: #1e293b;
      --shadow: rgba(255, 255, 255, 0.1);
    }

    .sidebar {
      width: 240px;
      background: var(--sidebar-bg);
      color: var(--sidebar-text);
      padding: 20px 0;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: fixed;
      height: 100%;
      left: 0;
      top: 0;
      transition: left 0.3s ease;
      z-index: 100;
    }

    .sidebar.hide {
      left: -240px;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #38bdf8;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      padding: 12px 20px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .sidebar ul li:hover {
      background: #334155;
    }

    .sidebar ul li.active {
      background: #38bdf8;
      color: #1e293b;
      font-weight: bold;
    }

    .logout {
      text-align: center;
      padding: 15px;
      background: #ef4444;
      cursor: pointer;
      border-radius: 6px;
      margin: 10px;
      transition: background 0.3s;
    }

    .logout:hover {
      background: #dc2626;
    }

    .main {
      flex: 1;
      padding: 20px;
      margin-left: 240px;
      transition: margin-left 0.3s ease;
      width: 100%;
    }

    .main.full {
      margin-left: 0;
    }

    .header {
      background: var(--card-bg);
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 10px;
      box-shadow: 0 2px 6px var(--shadow);
    }

    .menu-btn {
      display: none;
      font-size: 22px;
      cursor: pointer;
      color: var(--text);
    }

    .header h1 {
      font-size: 22px;
      color: var(--text);
    }

    .search input {
      padding: 8px 12px;
      border-radius: 6px;
      border: 1px solid #cbd5e1;
      outline: none;
      background: var(--bg);
      color: var(--text);
    }

    .dark-toggle {
      background: #38bdf8;
      border: none;
      color: white;
      padding: 8px 12px;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    .dark-toggle:hover {
      background: #0284c7;
    }

    .cards {
      margin-top: 25px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .card {
      background: var(--card-bg);
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 2px 6px var(--shadow);
      transition: transform 0.2s, background 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .chart-section {
      margin-top: 30px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
    }

    .chart-container {
      background: var(--card-bg);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px var(--shadow);
    }

    .chart-container h3 {
      margin-bottom: 10px;
      color: var(--text);
    }

    .table-section {
      margin-top: 30px;
      background: var(--card-bg);
      border-radius: 10px;
      box-shadow: 0 2px 6px var(--shadow);
      padding: 20px;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #e2e8f0;
      text-align: left;
      color: var(--text);
      white-space: nowrap;
    }

    th {
      background: #f1f5f9;
    }

    tr:hover {
      background: #f9fafb;
    }

    @media (max-width: 768px) {
      .menu-btn {
        display: block;
      }
      .main {
        margin-left: 0;
      }
      .cards {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 480px) {
      .cards {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar" id="sidebar">
    <div>
      <h2>📘 LMS Admin</h2>
      <ul>
        <li class="active">Dashboard</li>
        <li>Courses</li>
        <li>Students</li>
        <li>Instructors</li>
        <li>Assignments</li>
        <li>Reports</li>
        <li>Settings</li>
      </ul>
    </div>
    <button class="logout"><a href="{{route('logout')}}">Logout</a></button>
  </div>

  <div class="main" id="main">
    <div class="header">
      <span class="menu-btn" id="menu-btn">☰</span>
      <h1>Welcome, Admin</h1>
      <div style="display: flex; align-items: center; gap: 10px;">
        <div class="search">
          <input type="text" placeholder="Search...">
        </div>
        <button class="dark-toggle" id="dark-toggle">🌙</button>
      </div>
    </div>

    <div class="cards">
      <div class="card"><h3>Students</h3><p>1,245 Enrolled</p></div>
      <div class="card"><h3>Courses</h3><p>35 Active</p></div>
      <div class="card"><h3>Instructors</h3><p>18 Available</p></div>
      <div class="card"><h3>Revenue</h3><p>$12,400</p></div>
    </div>

    <div class="chart-section">
      <div class="chart-container">
        <h3>User Growth</h3>
        <canvas id="userChart"></canvas>
      </div>
      <div class="chart-container">
        <h3>Revenue Overview</h3>
        <canvas id="revenueChart"></canvas>
      </div>
      <div class="chart-container">
        <h3>Course Enrollments</h3>
        <canvas id="enrollChart"></canvas>
      </div>
    </div>

    <div class="table-section">
      <h2>Recent Enrollments</h2>
      <table>
        <thead>
          <tr>
            <th>Student Name</th>
            <th>Course</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Riya Sharma</td><td>React Basics</td><td>Completed</td><td>5 Nov 2025</td></tr>
          <tr><td>Aman Verma</td><td>Laravel Mastery</td><td>In Progress</td><td>7 Nov 2025</td></tr>
          <tr><td>Priya Singh</td><td>Python for Data Science</td><td>Completed</td><td>2 Nov 2025</td></tr>
          <tr><td>Rohit Yadav</td><td>UI/UX Design</td><td>Pending</td><td>8 Nov 2025</td></tr>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    const menuBtn = document.getElementById('menu-btn');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    const darkToggle = document.getElementById('dark-toggle');

    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('hide');
      main.classList.toggle('full');
    });

    darkToggle.addEventListener('click', () => {
      document.body.classList.toggle('dark');
      darkToggle.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
    });

    
    new Chart(document.getElementById('userChart'), {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Users',
          data: [200, 400, 600, 800, 1200, 1600],
          borderColor: '#38bdf8',
          fill: false,
          tension: 0.3
        }]
      },
      options: { responsive: true }
    });

  
    new Chart(document.getElementById('revenueChart'), {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Revenue ($)',
          data: [3000, 4000, 6000, 8000, 10000, 12000],
          backgroundColor: '#38bdf8'
        }]
      },
      options: { responsive: true }
    });

    new Chart(document.getElementById('enrollChart'), {
      type: 'doughnut',
      data: {
        labels: ['React', 'Python', 'Laravel', 'UI/UX'],
        datasets: [{
          data: [45, 25, 20, 10],
          backgroundColor: ['#38bdf8', '#3b82f6', '#0ea5e9', '#0284c7']
        }]
      },
      options: { responsive: true }
    });
  </script>
</body>
</html>