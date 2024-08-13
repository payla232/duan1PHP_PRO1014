<?php
session_start();
session_destroy();
unset($_SESSION['username']);
echo '<script>location.href="/duan1"</script>';