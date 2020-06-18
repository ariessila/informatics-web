<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = current_url();
// $config["total_rows"] = 100;
// $config["per_page"] = 10;

$config['uri_segment']              = 4;
$config['num_links']                = 2;
$config['use_page_numbers']         = TRUE;
$config['display_pages']            = TRUE;

$config['page_query_string']        = TRUE;
$config['query_string_segment']     = 'p';
$config['reuse_query_string']       = TRUE;

$config['prefix']                   = '';
$config['suffix']                   = '';
$config['use_global_url_suffix']    = FALSE;

$config['full_tag_open']            = '<ul class="pagination" style="display: table; margin: 0 auto;">';
$config['full_tag_close']           = '</ul>';

$config['first_link']               = 'Awal';
$config['first_tag_open']           = '<li>';
$config['first_tag_close']          = '</li>';
$config['first_url']                = '';

$config['last_link']                = 'Akhir';
$config['last_tag_open']            = '<li>';
$config['last_tag_close']           = '</li>';

$config['next_link']                = '&raquo;';
$config['next_tag_open']            = '<li>';
$config['next_tag_close']           = '</li>';

$config['prev_link']                = '&laquo;';
$config['prev_tag_open']            = '<li>';
$config['prev_tag_close']           = '</li>';

$config['cur_tag_open']             = '<li class="active"><a>';
$config['cur_tag_close']            = '</a></li>';
$config['num_tag_open']             = '<li>';
$config['num_tag_close']            = '</li>';
