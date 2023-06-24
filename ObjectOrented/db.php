<?php

class DB
{
    /*
    1.自動連線資料庫
    2.執行CRUD操作
    3.能指定資料表
   */
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    protected $user = "root";
    protected $pw = "";
    protected $table;
    protected $pdo;
    protected $query_result;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
    }

    function all(...$arg)
    {
        $sql = "select * from $this->table ";
        if (!empty($arg)) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }
                $sql = $sql . "where" . join(" && ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql . $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function save($cols)
    {   //有id>> update function
        if (isset($cols['id'])) {
            foreach ($cols as $key => $value) {
                if ($key != 'id') { //用foreach下判斷式排除id列(id不需要被更新)
                    $tmp[] = "`$key`='$value',";
                }
            }
            $sql = "update `$this->table` set " . join(",", $tmp) . " where `id`= '{$cols['id']}'";
            return $this->pdo->exec($sql);

        } else { //沒id >>執行function insert
            $keys = array_keys($cols); //用array_keys函數只取陣列的key值
            $sql = "insert into `$this->table`(`" . join("`,`", $keys) . "`) value ('" . join("','", $cols) . "')";
            
            return $this->pdo->exec($sql);;
        }
    }

    function find($arg)
    {
        $sql = "select * from $this->table where ";

        if (is_array($arg)) {  //判斷$arg是否為陣列
            foreach ($arg as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }
            $sql .= join(" && ", $tmp);
            // echo $sql;

        } else {
            $sql .= " `id` = '$arg' ";
        }
        //補充: is_numeric()  判斷$arg是否為字串型式的數字(ex:'1')

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($arg){
        $sql="delete from `$this->table` where ";
        if(is_array($arg)){
            foreach($arg as $key => $value){
    
                $tmp[]="`$key`='$value'";
            }
    
            $sql .= join(" && ",$tmp);
        }else{
    
            $sql .= " `id` = '$arg' ";
            
        }
    
        return $this->pdo->exec($sql);

    }

}
// function q($sql)
// {
//     return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// }

$Topic = new DB('topics');
$Option = new DB('options');

dd($Option->all('where `id`=50'));
dd($Option->all(['id' => 49]));
// dd($Option->q("select * from `options`"));
dd($Topic->find(21));
// dd($Option->del(63));



function dd($array)
{
    echo "<pre>";
    print_r($array);
}
