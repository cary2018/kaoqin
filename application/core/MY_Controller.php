<?php
/**

 * Author      : Cary.He
 * Contact QQ  : 373889161($S$-memory)
 * Email       : 373889161@qq.com
 

*/

defined('BASEPATH') OR exit('No direct script access allowed');
Class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username'))
        {
            header('location:'.base_url().'login');
        }
    }

}