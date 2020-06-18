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

$lang['db_invalid_connection_str'] = 'Tidak dapat menentukan pengaturan database berdasarkan data koneksi yang Anda kirimkan.';
$lang['db_unable_to_connect'] = 'Tidak dapat terhubung ke server database Anda menggunakan pengaturan yang disediakan.';
$lang['db_unable_to_select'] = 'Tidak dapat memilih database tertentu: %s';
$lang['db_unable_to_create'] = 'Tidak dapat membuat database tertentu: %s';
$lang['db_invalid_query'] = 'Query yang Anda kirimkan tidak valid.';
$lang['db_must_set_table'] = 'Anda harus mengatur tabel database untuk digunakan bersama query Anda.';
$lang['db_must_use_set'] = 'Anda harus menggunakan metode "SET" untuk memperbarui entri.';
$lang['db_must_use_index'] = 'Anda harus menentukan indeks untuk dicocokkan selama update batch.';
$lang['db_batch_missing_index'] = 'Satu baris atau lebih yang dikirim untuk memperbarui batch memerlukan indeks tertentu.';
$lang['db_must_use_where'] = 'Update entri tidak diperbolehkan kecuali mengandung klausa "WHERE".';
$lang['db_del_must_use_where'] = 'Hapus entri tidak diperbolehkan kecuali mengandung klausa "WHERE" atau "LIKE".';
$lang['db_field_param_missing'] = 'Diperlukan nama tabel sebagai parameter untuk menerima data dari field.';
$lang['db_unsupported_function'] = 'Fitur ini tidak tersedia dalam database yang Anda gunakan.';
$lang['db_transaction_failure'] = 'Transaksi gagal: Rollback terjadi.';
$lang['db_unable_to_drop'] = 'Tidak dapat menghapus database tertentu.';
$lang['db_unsupported_feature'] = 'Fitur tidak didukung dalam platform database yang Anda gunakan.';
$lang['db_unsupported_compression'] = 'Format kompresi file yang Anda pilih tidak didukung oleh server Anda.';
$lang['db_filepath_error'] = 'Tidak dapat menulis data ke lokasi file yang Anda kirimkan.';
$lang['db_invalid_cache_path'] = '"Cache path" yang Anda kirimkan tidak valid atau tidak dapat ditulis.';
$lang['db_table_name_required'] = 'Nama tabel diperlukan dalam perintah tersebut.';
$lang['db_column_name_required'] = 'Nama kolom diperlukan dalam perintah tersebut.';
$lang['db_column_definition_required'] = 'Definisi kolom diperlukan dalam perintah tersebut.';
$lang['db_unable_to_set_charset'] = 'Tidak dapat mengatur set karakter untuk koneksi klien: %s';
$lang['db_error_heading'] = 'Terjadi Error Pada Database';
