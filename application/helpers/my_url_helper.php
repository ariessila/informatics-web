<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('login_url'))
{
    function login_url($url = NULL)
    {
        $link = ($url)? '/'.$url : '';
        return site_url('auth/login').$link;
    }
}

if ( ! function_exists('logout_url'))
{
    function logout_url($url = NULL)
    {
        $link = ($url)? '/'.$url : '';
        return site_url('auth/logout').$link;
    }
}

if ( ! function_exists('admin_url'))
{
    function admin_url($url = NULL)
    {
        $link = ($url)? '/'.$url : '';
        return site_url('adminpage').$link;
    }
}

if ( ! function_exists('dosen_url'))
{
    function dosen_url($url = NULL)
    {
        $link = ($url)? '/'.$url : '';
        return site_url('dosenpage').$link;
    }
}

if ( ! function_exists('admin_assets'))
{
    function admin_assets($url = NULL)
    {
        $link = ($url)? '/'.$url : '/';
        return site_url('public/adminpage').$link;
    }
}

if ( ! function_exists('dosen_assets'))
{
    function dosen_assets($url = NULL)
    {
        $link = ($url)? '/'.$url : '/';
        return site_url('public/dosenpage').$link;
    }
}

if ( ! function_exists('home_url'))
{
    function home_url($url = NULL)
    {
        $link = ($url)? '/'.$url : '';
        return site_url('homepage').$link;
    }
}

if ( ! function_exists('home_assets'))
{
    function home_assets($url = NULL)
    {
        $link = ($url)? '/'.$url : '/';
        return site_url('public/homepage').$link;
    }
}



if ( ! function_exists('upload_path'))
{
    function upload_path($path = NULL)
    {
        $link = ($path)? $path.'/' : '';
        return 'uploads/'.$link;
    }
}

if ( ! function_exists('upload_url'))
{
    function upload_url($url = NULL)
    {
        $link = ($url)? $url.'/' : '';
        return site_url(upload_path()).$link;
    }
}
