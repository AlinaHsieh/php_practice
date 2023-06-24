<?php

class Employee
{
    public $Name = '小花';
    public function TheName()
    {
        echo "員工姓名叫做：" . $this->Name;
    }
}
$obj = new Employee;
$obj->Name = '小草';
$obj->TheName();


echo "<br>";
class MyMath
{
    public static function Cubic($X)
    {
        return $X * $X * $X;
    }
}
echo "5的三次方為：" . MyMath::Cubic(5);


echo "<br>";
class Circle
{
    const PI = 3.14;
    public $Radius;
    public function Area()
    {
        echo "圓面積為：" . ($this->Radius * $this->Radius * self::PI);
    }
}
echo "圓周率為：" . Circle::PI . "<br>";
$Obj = new Circle;
$Obj->Radius = 10;
$Obj->Area();


echo "<br>";
class HiStaff
{
    public $Name;
    function __Construct($Name)
    {
        $this->Name = $Name;
        echo "新員工的名字：" . $Name;
    }
}
$Staff = new HiStaff('小叮噹');


echo "<br>";
class Payroll
{
    public $Name;
    public function Payment($Hours,$PayRate){
        return $Hours * $PayRate;
    }
}

class BonusPayroll extends Payroll
{
    public function Payment($Hours,$PayRate){

        // return Payroll::Payment($Hours,$PayRate)+5000;
        return $Hours * $PayRate + 5000;
    }
}

$Money= new Payroll;
$MoneyBonus=new BonusPayroll;
echo "原本的薪資為：". $Money->Payment(20,2000)."<br>";
echo "加上獎金的薪資為：". $MoneyBonus->Payment(20,2000);
