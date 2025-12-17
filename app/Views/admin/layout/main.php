<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<style>
body {
margin: 0;
font-family: Arial, sans-serif;
background: #f4f6f8;
}
.navbar {
background: #1e293b;
color: #fff;
padding: 15px 20px;
display: flex;
justify-content: space-between;
align-items: center;
}
.sidebar {
width: 220px;
background: #0f172a;
color: #fff;
height: 100vh;
position: fixed;
top: 0;
left: 0;
padding-top: 60px;
}
.sidebar a {
display: block;
color: #cbd5e1;
padding: 12px 20px;
text-decoration: none;
}
.sidebar a:hover {
background: #1e293b;
color: #fff;
}
.content {
margin-left: 220px;
padding: 20px;
padding-top: 80px;
}
.card {
background: #fff;
padding: 20px;
border-radius: 8px;
box-shadow: 0 2px 5px rgba(0,0,0,0.1);
margin-bottom: 20px;
}
.cards {
display: flex;
gap: 20px;
}
.btn-logout {
background: #ef4444;
color: #fff;
padding: 8px 14px;
text-decoration: none;
border-radius: 6px;
font-size: 14px;
}
</style>
</head>
<body>


<div class="navbar">
<div><strong>Admin Panel</strong></div>
<div>
<span>Halo, Admin 👋</span>
<a href="<?= base_url('admin/logout') ?>" class="btn-logout">Logout</a>
</div>
</div>


<div class="sidebar">
<a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
<a href="#">Products</a>
<a href="#">Orders</a>
<a href="#">Settings</a>
</div>


<div class="content">
<?= $this->renderSection('content') ?>
</div>

</body>
</html>