<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_image')) {
    function upload_image($files, $method, $folder, $image_name, $error_data, $required = FALSE, $pagepath = 'adminpage/_layout/wrapper') {
        $CI =& get_instance();
        
        $file = is_array($files) ? $files[0] : $files;
        
        if (!empty($_FILES[$file]['tmp_name'])) {
            $config['upload_path']      = './'.upload_path($folder);
            $config['allowed_types']    = 'jpg|png|PNG|JPEG|jpeg|JPG';
            $config['encrypt_name']     = TRUE;
            $config['overwrite']        = TRUE;
            $config['max_size']         = '2048'; // KB
            $CI->load->library('upload', $config);
            
            if (!$CI->upload->do_upload($file)) {
                $error_data['error_upload'] = $CI->upload->display_errors('<i style="color: red;">', '</i>');
                $CI->load->view($pagepath, $error_data);
                return FALSE;
            } else { // Jika upload gambar berhasil
                if ($method == 'edit') {
                    // Hapus gambar lama
                    if ($image_name != '') {
                        unlink('./'.upload_path($folder).$image_name);
                        unlink('./'.upload_path($folder).'thumbs/'.$image_name);
                    }
                }
                
                // Image Editor
                $upload = array('upload_data' => $CI->upload->data());
                $gambar = $upload['upload_data']['file_name'];
                
                $config['image_library']    = 'gd2';
                $config['source_image']     = './'.upload_path($folder).$gambar;
                $config['quality']          = "100%";
                
                if (is_array($files)) {
                    $config['maintain_ratio']   = FALSE;
                    $config['width']            = intval($files[1]->width);
                    $config['height']           = intval($files[1]->height);
                    $config['x_axis']           = intval($files[1]->x);
                    $config['y_axis']           = intval($files[1]->y);
                    
                    $CI->load->library('image_lib', $config, 'crop');
                    
                    if (!$CI->crop->crop()) {
                        unlink('./'.upload_path($folder).$gambar);
                        $error_data['error_upload'] = $CI->crop->display_errors('<i style="color: red;">', '</i>');
                        $CI->load->view($pagepath, $error_data);
                        return FALSE;
                    }
                    
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = $files[1]->default_width;
                    $config['height']           = $files[1]->default_width;
                    
                    $CI->load->library('image_lib', $config, 'cresize');
                    
                    if (!$CI->cresize->resize()) {
                        unlink('./'.upload_path($folder).$image_name);
                        $error_data['error_upload'] = $CI->cresize->display_errors('<i style="color: red;">', '</i>');
                        $CI->load->view($pagepath, $error_data);
                        return FALSE;
                    }
                }
                
                $config['maintain_ratio']   = TRUE;
                $config['new_image']        = './'.upload_path($folder).'thumbs/';
                $config['create_thumb']     = TRUE;
                $config['thumb_marker']     = '';
                $config['width']            = 300;
                $config['height']           = 220;
                
                $CI->load->library('image_lib', $config, 'resize');
                
                if (!$CI->resize->resize()) {
                    unlink('./'.upload_path($folder).$image_name);
                    $error_data['error_upload'] = $CI->resize->display_errors('<i style="color: red;">', '</i>');
                    $CI->load->view($pagepath, $error_data);
                    return FALSE;
                }
                
                return $gambar;
            }
        } else if ($required) {
            $lang = $CI->config->item('language');
            $CI->lang->load('upload_lang', $lang);
            $error_data['error_upload'] = '<i style="color: red;">'.$CI->lang->line('upload_no_file_selected').'</i>';
            $CI->load->view($pagepath, $error_data);
            return FALSE;
        } else return $image_name;
    }
}

if ( ! function_exists('upload_document'))
{
    function upload_document($file, $method, $folder, $document_name, $error_data)
    {
        $CI = get_instance();
        // Bypass jika tidak mengupload file ketika mengedit data
        if ($method == 'edit')
        {
            if (empty($_FILES[$file]['tmp_name'])) return $document_name;
        }
        
        $config['upload_path']      = './'.upload_path($folder);
        $config['allowed_types']    = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']         = '300000'; // KB
        $CI->load->library('upload', $config);
        
        if ( ! $CI->upload->do_upload($file))
        {
            $error_data['error_upload'] = $CI->upload->display_errors('<i style="color: red;">', '</i>');
            $CI->load->view('adminpage/_layout/wrapper', $error_data);
            return FALSE;
        }
        
        // Jika upload dokumen berhasil
        else
        {
            if ($method == 'edit')
            {
                // Hapus dokumen lama
                if ($document_name != '') unlink('./'.upload_path($folder).$document_name);
            }
            
            // Image Editor
            $upload = array('upload_data' => $CI->upload->data());
            $dokumen = $upload['upload_data']['file_name'];
            return $dokumen;
        }
    }
}

if ( ! function_exists('dosen_document'))
{
    function dosen_document($file, $method, $folder, $document_name, $error_data, $required = FALSE, $pagepath = 'dosenpage/_layout/wrapper')
    {
        $CI = get_instance();
        // Bypass jika tidak mengupload file ketika mengedit data
        if (!empty($_FILES[$file]['tmp_name'])) {
            if ($method == 'edit')
            {
                if (empty($_FILES[$file]['tmp_name'])) return $document_name;
            }
            
            $config['upload_path']      = './'.upload_path($folder);
            $config['allowed_types']    = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
            $config['max_size']         = '30000'; // KB
            $CI->load->library('upload', $config);
            
            if ( ! $CI->upload->do_upload($file))
            {
                $error_data['error_upload'] = $CI->upload->display_errors('<i style="color: red;">', '</i>');
                $CI->load->view('dosenpage/_layout/wrapper', $error_data);
                return FALSE;
            }
            
            // Jika upload dokumen berhasil
            else
            {
                if ($method == 'edit')
                {
                    // Hapus dokumen lama
                    if ($document_name != '') unlink('./'.upload_path($folder).$document_name);
                }
                
                // Image Editor
                $upload = array('upload_data' => $CI->upload->data());
                $dokumen = $upload['upload_data']['file_name'];
                return $dokumen;
            }
        }
        else if ($required) {
            $lang = $CI->config->item('language');
            $CI->lang->load('upload_lang', $lang);
            $error_data['error_upload'] = '<i style="color: red;">'.$CI->lang->line('upload_no_file_selected').'</i>';
            $CI->load->view($pagepath, $error_data);
            return FALSE;
        } else return $document_name;
    }
}

if ( ! function_exists('view_error'))
{
    function view_error($judul = 'Error 404', $error_type = 404, $type = "adminpage")
    {
        if($type == "homepage"){
            $isi = 'homepage/_error/'.(string)$error_type;
            $parentView = 'homepage/_layout/wrapper';
        }
        elseif ($type == "dosenpage") {
            $isi = 'dosenpage/_error/'.(string)$error_type;
            $parentView = 'dosenpage/_layout/wrapper';
        }
        else{
            $isi = 'adminpage/_error/'.(string)$error_type;
            $parentView = 'adminpage/_layout/wrapper';
        }
        
        $CI = get_instance();
        $data = array(  'title'     => $judul,
        'jml'       => jml_nav(),
        'isi'       => $isi);
        $CI->load->view($parentView, $data);
        return;
    }
}

if ( ! function_exists('acak_id'))
{
    function acak_id($table = NULL, $pk = NULL)
    {
        $CI = get_instance();
        $CI->load->helper('string');
        $id = 0;
        if ($table == NULL OR $pk == NULL) return array('id' => $id, 'slug' => random_string('numeric', 3));
        do {
            $id = mt_rand(1,9).random_string('numeric', 7);
            $slug = substr($id, 4, 3);
        } while ($CI->crud->cw($table, array($pk => $id)) > 0);
        return array('id' => $id, 'slug' => $slug);
    }
}

if ( ! function_exists('acak_elektro'))
{
    function acak_elektro($table = NULL, $pk = NULL)
    {
        $CI = get_instance();
        $CI->load->helper('string');
        $id = 0;
        if ($table == NULL OR $pk == NULL) return array('id' => $id, 'slug' => random_string('numeric', 3));
        do {
            $id = mt_rand(1,9).random_string('numeric', 7);
            $slug = substr($id, 4, 3);
        } while ($CI->crud_fakultas->cw($table, array($pk => $id)) > 0);
        return array('id' => $id, 'slug' => $slug);
    }
}

if ( ! function_exists('waktu'))
{
    function waktu($wkt)
    {
        $jam = substr($wkt, 0, 2);
        $menit = substr($wkt, 3, 2);
        if ($jam < 12)
        {
            $AMPM = "AM";
            if ($jam == 0) $jam = 12;
        }
        else
        {
            $AMPM = "PM";
            if ($jam != 12) $jam = $jam-12;
        }
        
        return $jam.':'.$menit.' '.$AMPM;
    }
}

if ( ! function_exists('tgl_indo'))
{
    function tgl_indo($tgl)
    {
        if ($tgl == "0000-00-00")
        {
            return "-";
        }
        else
        {
            $tanggal    = substr($tgl, 8, 2);
            $bulan      = get_bulan(substr($tgl, 5, 2));
            $tahun      = substr($tgl, 0, 4);
            // var_dump($tgl);
            return $tanggal.' '.$bulan.' '.$tahun;
        }
    }
}

if ( ! function_exists('format_tgl'))
{
    function format_tgl($tgl, $indo = FALSE)
    {
        if (substr($tgl, 2, 1) == '-')
        { // ini format dd-mm-yyyy
            $tanggal = substr($tgl, 0, 2);
            $bulan = substr($tgl, 3, 2);
            $tahun = substr($tgl, 6, 4);
            return $tahun.'-'.$bulan.'-'.$tanggal;
        }
        else if (substr($tgl, 4, 1) == '-')
        { // ini format yyyy-mm-dd
            $tahun = substr($tgl, 0, 4);
            $bulan = substr($tgl, 5, 2);
            $tanggal = substr($tgl, 8, 2);
            return $indo? $tanggal.' '.get_bulan($bulan).' '.$tahun : $tanggal.'-'.$bulan.'-'.$tahun;
        }
    }
}

if ( ! function_exists('get_hari'))
{
    function get_hari($day)
    {
        switch ($day)
        {
            case 0:
            return "Ahad";
            break;
            case 1:
            return "Senin";
            break;
            case 2:
            return "Selasa";
            break;
            case 3:
            return "Rabu";
            break;
            case 4:
            return "Kamis";
            break;
            case 5:
            return "Jumat";
            break;
            case 6:
            return "Sabtu";
            break;
        }
    }
}

if ( ! function_exists('get_bulan'))
{
    function get_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
            return "Januari";
            break;
            case 2:
            return "Februari";
            break;
            case 3:
            return "Maret";
            break;
            case 4:
            return "April";
            break;
            case 5:
            return "Mei";
            break;
            case 6:
            return "Juni";
            break;
            case 7:
            return "Juli";
            break;
            case 8:
            return "Agustus";
            break;
            case 9:
            return "September";
            break;
            case 10:
            return "Oktober";
            break;
            case 11:
            return "November";
            break;
            case 12:
            return "Desember";
            break;
        }
    }
}

if ( ! function_exists('number_to_roman'))
{
    function number_to_roman($num)
    {
        $n = intval($num);
        $res = '';
        
        /*** roman_numerals array  ***/
        $roman_numerals = array(
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        );
        
        foreach ($roman_numerals as $roman => $number)
        {
            /*** divide to get  matches ***/
            $matches = intval($n / $number);
            
            /*** assign the roman char * $matches ***/
            $res .= str_repeat($roman, $matches);
            
            /*** substract from the number ***/
            $n = $n % $number;
        }
        
        /*** return the res ***/
        return $res;
    }
}

if ( ! function_exists('cari_query'))
{
    function cari_query($q, $data)
    {
        $builder = "IFNULL($data[0], '') LIKE CONCAT('%', '$q', '%')";
        for ($i = 1; $i < sizeof($data); $i++) {
            $builder .= " OR IFNULL($data[$i], '') LIKE CONCAT('%', '$q', '%')";
        }
        return $builder;
    }
}

if ( ! function_exists('jml_nav'))
{
    function jml_nav()
    {
        $CI = get_instance();
        return array(   'blogs'         => $CI->crud->ca('blogs'));
    }
}

if ( ! function_exists('do_hash'))
{
    function do_hash($data, $type = 'bcrypt')
    {
        if ($type == 'bcrypt') return password_hash($data, PASSWORD_BCRYPT);
        else if ($type == 'md5') return md5(md5($data.md5($data)));
    }
}

if ( ! function_exists('compare_hash'))
{
    function compare_hash($data1, $data2, $sama)
    {
        if ($sama) $stat = ($data1 === $data2)? TRUE : FALSE;
        else $stat = password_verify($data1, $data2);
        return $stat;
    }
}

if ( ! function_exists('set_lang'))
{
    function set_lang($lang)
    {
        $cookie = array(    'name'      => 'lang',
        'value'     => $lang,
    'expire'    => (60 /*detik*/ * 60 /*menit*/ * 24 /*jam*/ * 30 /*hari*/ * 12 /*bulan*/));
    set_cookie($cookie);
}
}

if ( ! function_exists('multiselect_tostring'))
{
    function multiselect_tostring($string)
    {
        if(! is_array($string) ){
            if( ($string == "") OR ($string == null))
            return "";
            else
            return $string;
        }else{
            if(count($string) > 0){
                // return TRUE;
                $string = implode(",", $string);
                return $string;
            }else{
                return "";
            }
        }
    }
}

if ( ! function_exists('eng_lang_version'))
{
    function eng_lang_version($value, $type)
    {   
        $CI =& get_instance();
        $data_array = [];
        $result = [];
        //tarik data config
        $data_config = $CI->config->item($type);
        
        $value = strtolower($value);
        
        if(strpos($value,",")){
            $data_array = explode(",", $value);
        }
        else{
            array_push($data_array, $value);
        }
        foreach ($data_array as $data)
        {
            if ($data_config != NULL && is_array($data_config))
            {
                if (array_key_exists(trim($data), $data_config))
                {
                    array_push($result,$data_config[trim($data)]);
                } 
            }
        }
        return ucwords(implode(", ",$result));
        
    }
}

if (!function_exists('pagination_en'))
{
    function pagination_en($config = '')
    {
        $config['first_link'] = "First";
        $config['last_link'] = "Last";
        
        return $config;
    }
}

if (!function_exists('empty_blog_en'))
{
    function empty_blog_en($lang)
    {
        $CI =& get_instance();
        $get_published_method = 'get_published_'.$lang;
        return $CI->blogs_model->{$get_published_method}();
    }
}

if (!function_exists('empty_inform_en'))
{
    function empty_inform_en($lang, $f = 0)
    {
        $CI =& get_instance();
        $CI->load->model('informasi_model');
        $get_published_method = 'get_published_'.$lang;
        return $CI->informasi_model->{$get_published_method}($f);
    }
}

if ( ! function_exists('debug'))
{
    function debug()
    {
        $numArgs = func_num_args();
        
        echo 'Total Arguments:' . $numArgs . "\n";
        
        $args = func_get_args();
        echo '<pre>';
        foreach ($args as $index => $arg) {
            echo 'Argument ke-' . $index . ':'. "\n";
            var_dump($arg);
            echo "\n";
            unset($args[$index]);
        }
        echo '</pre>';
        // die();
    }
}

if ( ! function_exists('serialize_delete_menu'))
{
    function serialize_delete_menu($id_halaman)
    {
        $CI =& get_instance();

        $json1 = $CI->crud->gda('manajemen_menu', array('id' => 11))['serialization'];
        $new1 = str_replace(',{"id":'.$id_halaman.'}]', ']', $json1); //ujung
        $new1 = str_replace('[{"id":'.$id_halaman.'},', '[', $new1); //pangkal
        $new1 = str_replace(',{"id":'.$id_halaman.'},', ',', $new1); //tengah
        $new1 = str_replace('[{"id":'.$id_halaman.'}]', '[]', $new1); //sendiri
        $CI->crud->u('manajemen_menu', array('serialization' => $new1), array('id' => 11));

        // Backup-nya
        $json2 = $CI->crud->gda('manajemen_menu', array('id' => 1))['serialization'];
        $new2 = str_replace(',{"id":'.$id_halaman.'}]', ']', $json2); //ujung
        $new2 = str_replace('[{"id":'.$id_halaman.'},', '[', $new2); //pangkal
        $new2 = str_replace(',{"id":'.$id_halaman.'},', ',', $new2); //tengah
        $new2 = str_replace('[{"id":'.$id_halaman.'}]', '[]', $new2); //sendiri
        return $CI->crud->u('manajemen_menu', array('serialization' => $new2), array('id' => 1));
    }
}
