<?php
/**
  系统设置
  date 2018-3-14
  author Cary.He
  email 373889161@qq.com
*/
class Systems extends MY_Controller
{
    public function index()
    {
        $data['list'] = $this->pu_fun->article_page('system',10,0,'id');
        $data['page'] = $this->pu_fun->page('./index','system',10);
        $this->load->view('system/index',$data);
    }
    public function add_system()
    {
        if($this->input->post('submit'))
        {
            $item = $this->input->post('item');
            $route = $this->input->post('route');
            $data = $this->input->post('data');
            $type = $this->input->post('type');
            $description = $this->input->post('description');
            if(!$item)
            {
                echo '<script>alert("变量名不能为空！");window.history.back();</script>';
                die;
            }
            $data = array(
                'item'=>$item,
                'route'=>$route,
                'data'=>$data,
                'type'=>$type,
                'description'=>$description
            );
            $this->db->insert('system',$data);
            header('location:/systems');
        }
        $this->load->view('system/add_system');
    }
    /*
    *
    *   编辑系统设置
    *   
    */
    public function edit()
    {
        $id = $this->input->get('id');
        $this->db->where('id',$id);
        $data['list'] = $this->pu_fun->showtable('system');
        if(!$data['list'])
        {
            header('location:/systems');
        }
        if($this->input->post('submit'))
        {
            $date = array(
                'route'=>$this->input->post('route'),
                'data'=>$this->input->post('data'),
                'type'=>$this->input->post('type'),
                'description'=>$this->input->post('description')
            );
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('system',$date);
            header('location:/systems');
        }
        $this->load->view('system/edit',$data);
    }
	//删除系统设置操作操作
	public function del()
	{
		$uid = $this->input->get_post('id');
		$this->pu_fun->onedel('system',$uid);
		header('location:/systems');
	}
}
