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
 * Date: 2017/2/25/0025
 * Time: 15:47
 */
class Public_Model extends CI_Model
{
    /**
     * @param $table
     * @param int $off
     * @param int $start
     * @return mixed
     * 会员列表分页函数使用
     */
    public function article_page($table,$off=5,$start=0,$order='up_work')
    {
        $end = $off;
        $star = $start;
        $this->db->limit($end,$star);
        $this->db->order_by($order.' desc');
        $query = $this->db->get($table);
        return $query->result();
    }

    /**
     * @param $table  查询表名
     * @param int $off  显示几条
     * @param int $start  从第几条开始
     * @return mixed
     */
    public function article_show($table,$off=7,$start=0)
    {
        //显示数量
        $this->db->limit($off,$start);
        //排序方式
        $this->db->order_by('addtime desc');
        //需要查询的数据表
        $query = $this->db->get($table);
        return $query->result();
    }

    /**
     * @param $table
     * @param int $id
     * @return mixed
     * 根据传入ID获取指定信息
     */
    public function article($table,$id=0)
    {
        // 查询条件
        $this->db->where('id in('.$id.')');
        $query = $this->db->get($table);
        return $query->result();
    }

    /**
     * @param $table
     * @return mixed
     * 显示数据表全部信息
     */
    public function showtable($table)
    {
        // 查询返回所有
        $query = $this->db->get($table);
        return $query->result();
    }

    /**
     * @param $talbe
     * @param $id
     * 删除单条数据
     */
    public function onedel($talbe,$id)
    {
        $arr = array(
            'id' => $id
        );
        $this->db->where($arr);
        $this->db->delete($talbe);
    }

    /**
     * @param $talbe
     * @param $id
     * 删除批量数据
     */
    public function alldel($talbe,$id)
    {
        $this->db->where('id in('.$id.')');
        $this->db->delete($talbe);
    }

    /**
     * @param $table1
     * @param $table2
     * @param $onin   table1.pid = table2.id
     * @return mixed
     * 双表联查
     */
    public function left_jion($table1,$table2,$onin,$off=7,$start=0)
    {
        $this->db->select('hn_user.id,hn_user.username,hn_user.pid,hn_user.rid,hn_user.header_img,hn_user.addtime,hn_position.position');
        //显示数量
        $this->db->limit($off,$start);
        //排序方式
        $this->db->order_by('hn_user.orderby desc');
        $this->db->order_by('hn_user.addtime desc');
        $this->db->from($table1);
        $this->db->join($table2,$onin);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function article_jion($table1,$table2,$onin,$off=7,$start=0)
    {
        //显示数量
        $this->db->limit($off,$start);
        //排序方式
        $this->db->order_by('b.up_work desc');
        $this->db->from($table1);
        $this->db->join($table2,$onin);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    /**
     * @param $table1
     * @param $table2
     * @param $table3
     * @param $join
     * @param $join2
     * @param int $off
     * @param int $start
     * @return mixed
     * 三表联查
     */
    public function user_join($table1,$table2,$table3,$join,$join2,$off=7,$start=0)
    {
        $this->db->select('a.*,b.position,c.region');
        //显示数量
        $this->db->limit($off,$start);
        //排序方式
        $this->db->order_by('a.addtime desc');
        $this->db->from($table1);
        $this->db->join($table2,$join);
        $this->db->join($table3,$join2);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    /**
     * @param $str
     * @return mixed
     * 清除空格换行字符
     */
    public function trimall($str){
        $qian=array(" ","　","\t","\n","\r");
        return str_replace($qian, '', $str);
    }

    /**
     * @param $arr
     * 递归函数
     */
    public function recursion($arr,$fid = 'fid',$pname = 'position',$order='orderby',$is_show = 'is_show',$pid=0,$lev=0)
    {
        $res = array();
        foreach($arr as $v)
        {
            if($v->fid == $pid)
            {
                $res[] = array('id'=>$v->id,'fid'=>$v->{$fid},'name'=>$v->{$pname},'orderby'=>$v->{$order},'is_show'=>$v->{$is_show},'lev'=>$lev);
                if($v->id)
                {
                    if($this->recursion($arr,$fid = 'fid',$pname = 'position',$order='orderby',$is_show = 'is_show',$v->id))
                    {
                        $res[] = $this->recursion($arr,$fid,$pname,$order,$is_show,$v->id,$lev+1);
                    }
                }

            }
        }
        return $res;
    }
    /**
     * @param $arr
     * @return array
     * 循环无限级菜单 并合并成二维数组
     */
    public function formenu($arr){
        static $call = array();
        foreach($arr as $key){
            $count = $this->if_array($key);
            if($count > 1){
                $this->formenu($key);
            }else
                $call[] = $key;
        }
        return $call;
    }
    /**
     * @param $arr
     * @return int
     * 判断数组是否为一维数组
     */
    public function if_array($arr){
        if(!is_array($arr)){
            return 0;
        }else{
            $dimension = 0;
            foreach($arr as $item1)
            {
                $t1=$this->if_array($item1);
                if($t1>$dimension){$dimension = $t1;}
            }
            return $dimension+1;
        }
    }

}