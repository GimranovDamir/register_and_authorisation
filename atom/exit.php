<?php
setcookie('user', $user['name'], time() - 3600, "/atom");
header('Location: /atom');
?>
