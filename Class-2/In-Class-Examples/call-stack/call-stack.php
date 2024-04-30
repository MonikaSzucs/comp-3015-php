<?php

function registerUser()
{
    echo 'Registering...' . PHP_EOL;
    saveUserInfo();
    sendVerificationEmail();
    redirectToDashboard();
    echo 'Exiting registerUser...' . PHP_EOL;
}

function saveUserInfo()
{
    echo 'Saving user info in the database...' . PHP_EOL;
}

function sendVerificationEmail()
{
    echo 'Sending verification email...' . PHP_EOL;
}

function redirectToDashboard()
{
    echo 'Redirecting to dashboard...' . PHP_EOL;
    trackNewRegistration();
}

function trackNewRegistration()
{
    echo 'Pushing new registration info to analytics tool...' . PHP_EOL;
}

registerUser();
