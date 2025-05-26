<?php
// api/index.php

// This file acts as the entry point for Vercel's serverless function.
// It forwards the request to Laravel's standard public/index.php.

// Ensure proper working directory is set for Laravel to find its files.
// Vercel sets the current working directory to the 'api' directory,
// so we need to go up one level to reach the Laravel root.
chdir(__DIR__ . '/../');

// Load Laravel's core application bootstrap file.
require __DIR__ . '/../public/index.php';