<?php
/**
 * CreateTime  : 2016/10/6 15:29
 * Author      : Cary.He
 * Contact QQ  : 373889161($S$-memory)
 * Email       : 373889161@qq.com
 */

/**
 * Created by PhpStorm.
 * User: asusa
 * Date: 2017/2/26/0026
 * Time: 00:26
 */
class Login_Model extends CI_Model
{
    private $userinfo;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    /**
     * @param $userinfo
     * 存入用户登录session信息
     */

    public function save_session($userinfo)
    {
        $this->session->set_userdata($userinfo);
    }



    public function user_login($table,$arr=array())
    {
        // 查询条件
        $this->db->where($arr);
        $query = $this->db->get($table);
        return $query->result();
    }

}