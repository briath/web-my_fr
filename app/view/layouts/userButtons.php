<?php
echo '<form class="form-inline my-2 my-lg-0">';
if(!empty($_SESSION)){
    echo '<a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-sm mx-md-1" href="/register/logout">LOG OUT</a>';
} else {
    echo '<a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-sm mx-md-1" href="/register/login">LOG IN</a>';
    echo '<a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-sm mx-md-1" href="/register/register">SIGN UP</a>';
}
echo '</form>';