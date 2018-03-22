<?php
/**

 * Author      : Cary.He
 * Contact QQ  : 373889161($S$-memory)
 * Email       : 373889161@qq.com
 

*/

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('PRC');
Class MY_Controller extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->Model('Public_Model','pu_fun');
		$this->load->library('Get_password');
        if(!$this->session->userdata('username'))
        {
            header('location:'.base_url().'login');
        }
        $this->db->where('type',0);
        $data = $this->pu_fun->showtable('system');
        foreach($data as $val)
        {
            define($val->item,$val->data);
        }
        defined("SYS_DO_WORK") OR define("SYS_DO_WORK", '17:30:00');
        defined("SYS_UP_WORK") OR define("SYS_UP_WORK", '07:00:00');
	}
}