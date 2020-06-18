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

$lang['email_must_be_array'] = 'Metode validasi e-mail harus dikirim menggunakan array.';
$lang['email_invalid_address'] = 'Alamat e-mail tidak sah: %s';
$lang['email_attachment_missing'] = 'Tidak dapat menemukan lampiran e-mail berikut: %s';
$lang['email_attachment_unreadable'] = 'Tidak dapat membuka lampiran berikut: %s';
$lang['email_no_from'] = 'Tidak dapat mengirim pesan tanpa menggunakan header "From".';
$lang['email_no_recipients'] = 'Anda harus menyertakan penerima: "To", "Cc", atau "Bcc"';
$lang['email_send_failure_phpmail'] = 'Tidak dapat mengirim e-mail menggunakan PHP mail(). Server Anda mungkin tidak dikonfigurasi untuk mengirim pesan menggunakan metode ini.';
$lang['email_send_failure_sendmail'] = 'Tidak dapat mengirim e-mail menggunakan PHP Sendmail. Server Anda mungkin tidak dikonfigurasi untuk mengirim pesan menggunakan metode ini.';
$lang['email_send_failure_smtp'] = 'Tidak dapt mengirim e-mail menggunakan PHP SMTP. Server Anda mungkin tidak dikonfigurasi untuk mengirim pesan menggunakan metode ini.';
$lang['email_sent'] = 'Pesan Anda sukses terkirim menggunakan protokol berikut: %s';
$lang['email_no_socket'] = 'Tidak dapat membuka soket untuk Sendmail. Silakan cek pengaturan Anda.';
$lang['email_no_hostname'] = 'Anda belum menentukan nama host SMTP.';
$lang['email_smtp_error'] = 'Terjadi error pada SMTP berikut: %s';
$lang['email_no_smtp_unpw'] = 'Error: Anda harus menentukan username dan password SMTP.';
$lang['email_failed_smtp_login'] = 'Gagal mengirim perintah AUTH LOGIN. Error: %s';
$lang['email_smtp_auth_un'] = 'Gagal mengontetikasi username. Error: %s';
$lang['email_smtp_auth_pw'] = 'gagal mengontetikasi password. Error: %s';
$lang['email_smtp_data_failure'] = 'Tidak dapat mengirim data: %s';
$lang['email_exit_status'] = 'Kode status exit: %s';
