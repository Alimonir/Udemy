<?php

declare(strict_types=1);
class Model extends Database
{
    protected string $table;
    protected array $allowedColumns = [];
    public function __construct() {}
    /**
     * Summary of insert
     * @param array $data
     * @return void
     * بتاخد مني الداتا وبعدين تظبطها وتشوف العموايد المناسبة إالانا محتاجها وبعدين وتفلترها وتحط الداتا مظبوطة 
     *ex'INSERT INTO `users`(`id`, `email`, `firstname`, `lastname`, `password`, `role`, `date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')'
     */
    public function insert(array $data)
    {
        //remove un wanted column
        foreach ($data as $key => $value) {
            if (!in_array($key, $this->allowedColumns)) {
                unset($data[$key]);
            }
        }
        $keys = array_keys($data);
        $query = "INSERT INTO `$this->table`(" . implode(",", $keys) . ") VALUES (:" . implode(", :", $keys) . ")";
        $this->query(query: $query, data: $data);
    }
    /**
     * Summary of whereInData
     * @param array $data
     * @return array|bool
     * بتاحد الداتا بتاعتي إالانا واخدها من الفورم  وبعدين ببحث بشكل ديناميك عن الايميل مثلا موجود في الداتابيس بتاعتي ولا لاء
    * $query = "SELECT * FROM `users` WHERE email =:email";
    * this is echo SELECT * FROM `users` WHERE email =:email
     */
    public function whereInData(array $data){
        $keys = array_keys($data);
        $query = "SELECT * FROM `$this->table` WHERE ";
        foreach ($keys as $key) {
            $query .= $key ." =:".$key ." && ";
        }
        $query = trim($query," && ") ;
        $result = $this->query($query, $data);
       if (is_array($result)) {
        return $result;
       }
       return false;
    }
    /**
     * Summary of firstInData
     * @param array $data
     * @return mixed
     * بتبحث عن اول ايميل مثلا يظهر معايا
     */
    public function firstInData(array $data){
        $keys = array_keys($data);
        $query = "SELECT * FROM `$this->table` WHERE ";
        foreach ($keys as $key) {
            $query .= $key ." =:".$key ." && ";
        }     

        $query = trim($query," && ") ;
        $query .= " order by id desc limit 1";

        //var_dump($query);

        $result = $this->query($query, $data);
        
    
       if (is_array($result)) {
        return $result[0];
       }
       return false;
    }
}
