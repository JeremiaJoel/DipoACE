<?php

echo"Halo, Welcome di halaman kaprodi";
        echo"<h1>".Auth::user()->email."<h1>";
        // return view('dashboard');
        echo "<a href='logout'> Logout </a>";