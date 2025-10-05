<?php
    
?>
<style>
    /* 
    section p a {

    } 
    */
</style>
<header>
    <div class="d-flex align-items-center">
        <p class="">Hey! <a href="../auth/login.php">login</a> Or <a href="../auth/register.php">Register</a></p>
        <a href="../pages/cart.php" class="ms-auto">
            <button class=" btn btn-dark border">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
            </button>
        </a>
    </div>
    <hr>

    <div class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="#">
                <img src="../images/company_logo.jpg" alt="logo" width="50" height="50">
                company
            </a>
            <button 
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar_collapse"
                aria-controls="navbar_collapse"
                aria-expanded="false"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar_collapse">
                <ul class="navbar-nav d-flex flex-row ms-auto gap-3">
                    <li class="nav-item custom-inline-block">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item custom-inline-block">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item custom-inline-block">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item custom-inline-block">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item custom-inline-block">
                        <a class="nav-link" href="#">help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
