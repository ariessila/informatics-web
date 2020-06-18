<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Crud_Fakultas extends CI_Model {
    private $_fak;
    public function __construct()
    {
        parent::__construct();
        $this->_fak = $this->load->database('fakultas', TRUE);
        
    }
    public function ca($t){return $this->_fak->get($t)->num_rows();}
    public function ga($t){return $this->_fak->get($t)->result();}
    public function gao($t,$o){return $this->_fak->order_by($o)->get($t)->result();}
    public function gl($t,$l,$f){return $this->_fak->limit($l,$f)->get($t)->result();}
    public function glo($t,$l,$f,$o){return $this->_fak->limit($l,$f)->order_by($o)->get($t)->result();}
    public function cw($t,$w){return $this->_fak->where($w)->get($t)->num_rows();}
    public function cwlike($t,$w,$like){return $this->_fak->where($w)->like($like)->get($t)->num_rows();}
    public function gw($t,$w){return $this->_fak->where($w)->get($t)->result();}
    public function gwo($t,$w,$o){return $this->_fak->where($w)->order_by($o)->get($t)->result();}
    public function gwl($t,$w,$l,$f){return $this->_fak->where($w)->limit($l,$f)->get($t)->result();}
    public function gwlo($t,$w,$l,$f,$o){return $this->_fak->where($w)->limit($l,$f)->order_by($o)->get($t)->result();}
    public function gjwlo($t,$tj,$c,$w,$l,$f,$o,$jj = 'LEFT'){return $this->_fak->join($tj,$tj.'.'.$c.' = '.$t.'.'.$c,$jj)->where($w)->limit($l,$f)->order_by($o)->get($t)->result();} //$tj == table join, $c = kolom yang mau di cocokkan, $jj = jenis join
    public function gjwlikelo($t,$tj,$c,$w,$like,$l,$f,$o,$jj = 'LEFT'){return $this->_fak->join($tj,$tj.'.'.$c.' = '.$t.'.'.$c,$jj)->where($w)->like($like)->limit($l,$f)->order_by($o)->get($t)->result();} //$tj == table join, $c = kolom yang mau di cocokkan, $jj = jenis join
    public function gd($t,$w){return $this->_fak->where($w)->get($t)->row();}
    public function gjd($t,$tj,$c,$w,$jj = 'LEFT'){return $this->_fak->join($tj,$tj.'.'.$c.' = '.$t.'.'.$c,$jj)->where($w)->get($t)->row();}
    public function gda($t,$w){return $this->_fak->where($w)->get($t)->row_array();}
    public function i($t,$d){$this->_fak->insert($t,$d);}
    public function u($t,$d,$w){$this->_fak->where($w)->update($t,$d);}
    public function d($t,$w){$this->_fak->where($w)->delete($t);}
    public function q($q){return $this->_fak->query($q);}
    public function qa($q){return $this->_fak->query($q)->result();}
}
