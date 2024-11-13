<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    /* Neutral, Professional POS Color Scheme */

    body {
        background-color: #f4f4f9;
        color: #333;
        font-family: Arial, sans-serif;
    }
    .navbar {
        background-color: #2c3e50; /* Dark Gray-Blue Navbar */
        border-bottom: 3px solid #16a085; /* Accent color */
    }
    .navbar-brand h3 {
        color: #ecf0f1 !important;
        font-weight: 600;
    }
    .navbar-toggler {
        border-color: #ecf0f1;
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28236,240,241,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
    .nav-link {
        color: #bdc3c7 !important;
        font-weight: 500;
    }
    .nav-link.active {
        color: #16a085 !important; /* Accent color for active links */
        font-weight: bold;
    }
    .container {
        padding-top: 20px;
    }
   .col-md-12 {
        background-color: #ffffff;
        border-radius: 6px;
        padding: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for focus */
    }

    .row {
        background-color: #ffffff;
        border-radius: 6px;
        padding: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for focus */
    }
    /* Section styling with light background */
    .content-section {
        background-color: #f8f9fa;
        padding: 0px;
        border-radius: 6px;
        margin-top: 0px;
        border: 1px solid #e5e5e5; /* Light border for definition */
    }
    /* Button styling */
    .btn-primary {
        background-color: #16a085;
        border-color: #16a085;
        color: #ffffff;
    }
    .btn-primary:hover {
        background-color: #13876d;
        border-color: #13876d;
    }

/* .logout{
    float: right;
} */
</style>


@stack('css')