<?php
class Database
{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "project";

    protected function conn()
    {
        $mysqli = new mysqli($this->server, $this->user, $this->password, $this->dbname) or die($mysqli);
        return $mysqli;
    }
}
class sfunction extends Database
{
    public function get_safe_value($str)
    {
        $result = $this->conn()->real_escape_string($str);
        $result = htmlentities($result);
        return $result;
    }
}
class query extends Database
{
    // tocheck the database connection
    // public function try(){
    // if($this->conn()){
    //     echo "connected.<br>";
    // }
    // else{
    //     echo "connection failes .<br>";
    // }
    // }
    // -------------------------
    public function  get_data($table, $field = "", $condition = "", $order_by_field = "", $order_updown = "", $limitofset = "", $limit = "")
    {
        $sql = "select * from $table ";
        if ($field != "") {
            $sql = "select {$field} from {$table}";
        }
        if ($condition != "") {
            $sql .= " where ";
            $count = count($condition);
            $i = 0;
            foreach ($condition as $key => $value) {
                $sql .= " {$key} ='{$value}' ";
                $i++;
                if ($i < $count) {
                    $sql .= " and ";
                }
            }
        }
        if ($order_by_field != "" && $order_updown != "") {
            $sql .= " order by {$order_by_field} {$order_updown} ";
        }
        if ($limitofset != "" && $limit != "") {
            $sql .= " limit {$limitofset},{$limit} ";
        }
        //  die($sql);
        $result = $this->conn()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            // echo "<pre>";
            // print_r($arr);
            return $arr;
        } else {
            //  echo "No data found";
            return 0;
        }
    }
    public function  insert_data($table, $field, $values)
    {
        $sql = "insert into $table";
        if ($field != "" && $values != "") {
            $sql .= "({$field})";
            $array = explode(",", $values);
            $count = count($array);
            $i = 0;
            $sql .= " values(";
            foreach ($array as $value) {
                $i++;
                $sql .= " '$value";
                if ($i < $count) {
                    $sql .= "',";
                }
            }
            $sql .= "')";
        }

        // die($sql);
        return $result = $this->conn()->query($sql);
    }
    public function  insert2_data($table, $condi_array = "")
    {
        $sql = "insert into $table (";
        if ($condi_array != "") {
            $count = count($condi_array);
            $i = 0;
            foreach ($condi_array as $key => $value) {
                $i++;
                $sql .= $key;
                if ($i < $count) {
                    $sql .= ",";
                }
            }
            $sql .= ") values (";
            $j = 0;
            foreach ($condi_array as $key => $value) {
                $j++;
                $sql .= "'" . $value . "'";
                if ($j < $count) {
                    $sql .= ",";
                }
            }
            $sql .= ")";
        }

        // die($sql);
        return $result = $this->conn()->query($sql);
    }
    public function  update_data($table, $condition = "", $whereFiled = "", $wherethis = "")
    {
        $sql = "update $table set ";
        if ($condition != "") {
            $count = count($condition);
            $i = 0;
            foreach ($condition as $key => $value) {
                $sql .= " {$key} ='{$value}' ";
                $i++;
                if ($i < $count) {
                    $sql .= ",";
                }
            }
        }
        if ($whereFiled != "" && $wherethis != "") {
            $sql .= " where {$whereFiled} = '{$wherethis}'";
        }
        // die($sql);
        $result = $this->conn()->query($sql);
        return $result;
    }
    public function  delete_data($table, $whereFiled = "", $wherethis = "")
    {
        $sql = "delete from $table";
        if ($whereFiled != "" && $wherethis != "") {
            $sql .= " where {$whereFiled} = '{$wherethis}'";
        }

        // die($sql);
        $result = $this->conn()->query($sql);
    }
    public function  get_join_data($table1, $table2, $field = "", $condition1 = "", $condition2 = "", $order_by_field = "", $order_updown = "", $limitofset = "", $limit = "", $condition3 = "")
    {
        $sql = "select * from $table1,$table2 ";
        if ($field != "") {
            $sql = "select {$field} from {$table1},{$table2}";
        }
        if ($condition1 != "" && $condition2 == "" && $condition3 == "") {
            $sql .= " where $table1.$condition1 = $table2.$condition1 ";
        }
        if ($condition1 != "" && $condition2 != "" && $condition3 == "") {
            $sql .= " where $table1.$condition1 = $table2.$condition1 ";
            $sql .= " and ";
            $count = count($condition2);
            $i = 0;
            foreach ($condition2 as $key => $value) {
                $sql .= " {$key} ='{$value}' ";
                $i++;
                if ($i < $count) {
                    $sql .= " and ";
                }
            }
        }
        if ($condition1 != "" && $condition3 != "" && $condition2 == "") {
            $sql .= " where $table1.$condition1 = $table2.$condition3 ";
        }
        if ($condition1 != "" && $condition3 != "" && $condition2 != "") {
            $sql .= " where $table1.$condition1 = $table2.$condition3 ";
            $sql .= " and ";
            $count = count($condition2);
            $i = 0;
            foreach ($condition2 as $key => $value) {
                $sql .= " {$key} ='{$value}' ";
                $i++;
                if ($i < $count) {
                    $sql .= " and ";
                }
            }
        }


        if ($order_by_field != "" && $order_updown != "") {
            $sql .= " order by {$order_by_field} {$order_updown} ";
        }
        if (($limitofset != "" || $limitofset == 0) && $limit != "") {
            $sql .= " limit  {$limitofset},{$limit} ";
        }
        //  die($sql);
        $result = $this->conn()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
            // echo $sql;
        } else {
            //  echo "No data found";
            return 0;
        }
    }
}


class chat extends Database
{
    // $sql ="select * from user where or and jjjjjjj";
    public function get_data($sql)
    {
        $result = $this->conn()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            //  echo "No data found";
            return 0;
        }
    }
    public function delete_data($sql)
    {
        $result = $this->conn()->query($sql);
    }
     // $sql ="select * from user where or and jjjjjjj";
     public function put_data($sql)
     {
         $result = $this->conn()->query($sql);
         return $result;
     }
     // $sql ="select * from user where or and jjjjjjj";
     public function mult_qry($sql)
     {
         $result = $this->conn()->multi_query($sql);
         return $result;
     }
     // for Teacher exam function
     public function subject_question($t1, $t2, $field, $condition)
     {
         $sql = "SELECT $field FROM $t1 LEFT JOIN $t2 on $t1.$condition=$t2.$condition";
         // die($sql);
         $result = $this->conn()->query($sql);
         if ($result->num_rows > 0) {
             $arr = array();
             while ($row = $result->fetch_assoc()) {
                 $arr[] = $row;
             }
             return $arr;
         } else {
             //  echo "No data found";
             return 0;
         }
     }
}

// to use this all object and its classes functi0ons
// $obj=new query();
// $start='0';
// $end=10;
// $obj->get_data('studentpf','*','','','',$start,$end);
// $obj->try();
// $condi_array = array("userName"=>"deepak");
// $obj->insert_data("user","userName,eMail,pass","deepak,deepakrajbanshi68@gmail.com,deepak2");
// $obj->delete_data("user","userId","4");
// $obj->update_data("user",$condi_array,"userId","4");
// $start="0";
// $end="2";
// $row=$obj->get_data("user","",$condi_array,"","",$start,$end);
// foreach($row as $list){
//     echo $list['userName']." ".$list['eMail']." ".$list['pass']."<br>";
// }