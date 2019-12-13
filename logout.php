<?php
session_start();
session_destroy();
echo "
<script>
alert('Anda berhasil logout');
window.location.href='login.html';
</script>
";