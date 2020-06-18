<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= '<b>{field}</b> harus diisi.';
$lang['form_validation_isset']			= '<b>{field}</b> tidak boleh kosong.';
$lang['form_validation_valid_email']		= '<b>{field}</b> harus format e-mail (contoh@email.com).';
$lang['form_validation_valid_emails']		= 'Semua <b>{field}</b> harus format e-mail (contoh@email.com).';
$lang['form_validation_valid_url']		= '<b>{field}</b> harus format URL (http[s]://www.contoh.com).';
$lang['form_validation_valid_ip']		= '<b>{field}</b> harus format IP (xxx.xxx.xxx.xxx).';
$lang['form_validation_min_length']		= 'Panjang <b>{field}</b> harus minimal <b>{param}</b> karakter.';
$lang['form_validation_max_length']		= 'Panjang <b>{field}</b> tidak boleh melebihi <b>{param}</b> karakter.';
$lang['form_validation_exact_length']		= 'Panjang <b>{field}</b> harus pas <b>{param}</b> karakter.';
$lang['form_validation_alpha']			= '<b>{field}</b> hanya boleh huruf saja.';
$lang['form_validation_alpha_numeric']		= '<b>{field}</b> hanya boleh huruf dan angka saja.';
$lang['form_validation_alpha_numeric_spaces']	= '<b>{field}</b> hanya boleh huruf, angka, dan spasi saja.';
$lang['form_validation_alpha_dash']		= '<b>{field}</b> hanya boleh huruf, angka, garis bawah, dan garis datar saja.';
$lang['form_validation_numeric']		= '<b>{field}</b> hanya boleh angka saja.';
$lang['form_validation_is_numeric']		= '<b>{field}</b> harus berisi karakter angka saja.';
$lang['form_validation_integer']		= '<b>{field}</b> harus berisi integer.';
$lang['form_validation_regex_match']		= 'Format <b>{field}</b> tidak benar.';
$lang['form_validation_matches']		= 'Isi <b>{field}</b> harus sama dengan isi <b>{param}</b>.';
$lang['form_validation_differs']		= 'Isi <b>{field}</b> harus beda dengan isi <b>{param}</b>.';
$lang['form_validation_is_unique'] 		= '<b>{field}</b> ini sudah terpakai.';
$lang['form_validation_is_natural']		= '<b>{field}</b> hanya boleh bilangan cacah saja.';
$lang['form_validation_is_natural_no_zero']	= '<b>{field}</b> hanya boleh bilangan bulat positif saja.';
$lang['form_validation_decimal']		= '<b>{field}</b> hanya boleh bilangan desimal saja.';
$lang['form_validation_less_than']		= '<b>{field}</b> harus kurang dari <b>{param}</b>.';
$lang['form_validation_less_than_equal_to']	= '<b>{field}</b> harus kurang dari atau sama dengan <b>{param}</b>.';
$lang['form_validation_greater_than']		= '<b>{field}</b> harus lebih dari <b>{param}</b>.';
$lang['form_validation_greater_than_equal_to']	= '<b>{field}</b> harus lebih dari atau sama dengan <b>{param}</b>.';
$lang['form_validation_error_message_not_set']	= 'Tidak dapat mengakses pesan error yang berhubungan dengan field <b>{field}</b>.';
$lang['form_validation_in_list']		= '<b>{field}</b> harus salah satu dari: <b>{param}</b>.';
