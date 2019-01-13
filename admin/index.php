<?php session_start() ?>
<?php if (isset($_SESSION['username_admin'])): ?>
<?php header('location: home');?>
<?php else: ?>
<?php header('location: users/login'); ?>
<?php endif; ?>