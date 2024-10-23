<?php

echo 'Halo, Welcome di halaman pembimbing Akademik';
echo '<h1>' . Auth::user()->email . '<h1>';

// return view('dashboard');
echo "<a href='logout'> Logout </a>";
