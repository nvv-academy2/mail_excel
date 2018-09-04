<?php


class Child
{

}

class User
{

}

/**
 * Class Test
 * @property string $viktor
 */
class Test
{

    public $model;

    /**
     * METHOD = POST
     * Test constructor.
     * @param Child $user
     */
    public function __construct(Child $user)
    {
        $this->model = $user;
    }

    const D = 123;

    private $test = 1;
    public $ptest = 2;


    public function t(int $var)
    {

    }
}


$reflectionClass = new ReflectionClass(Test::class);

print_r($reflectionClass->getDocComment());
die();

/** @var ReflectionMethod $reflectionObject */
$reflectionMethod = $reflectionClass->getMethods()[0];
/** @var ReflectionParameter  $reflectionParameter */
$reflectionParameter = $reflectionMethod->getParameters()[0];

$class = $reflectionParameter->getClass()->name;
$dependency = new $class();
$obj = new Test($dependency);

print_r($obj);

//print_r($reflectionClass->getProperties());




























/** STRATEGY
class PaymentStrategy
{
    private $paymentService;

    public function __construct($method)
    {
        switch ($method) {
            case "stripe":
                $this->paymentService = new Stripe();
            case "paypal":
                $this->paymentService = new PayPal();
            case "liqpay":
                $this->paymentService = new LiqPay();
        }
    }

    public function pay(float $amount): bool
    {
        return $this->paymentService->pay($amount);
    }
}

interface Payable
{
    public function pay(float $amount): bool;
    public function setCredits(): self;
}

class PayPal implements Payable
{
    public function pay(float $amount): bool
    {
        file_put_contents(__CLASS__.".txt", date("Y-m-d").PHP_EOL);
        return true;
    }

    public function setCredits(): Payable
    {
        return $this;
    }
}


class Stripe implements Payable
{

    public function pay(float $amount): bool
    {
        file_put_contents(__CLASS__.".txt", $amount." UAH ".date("Y-m-d").PHP_EOL);
        return true;
    }

    public function setCredits(): Payable
    {
        return $this;
    }
}

class LiqPay implements Payable
{

    public function pay(float $amount): bool
    {
        file_put_contents(__CLASS__.".txt", $amount." UAH ".date("Y-m-d").PHP_EOL);
        return true;
    }

    public function setCredits(): Payable
    {
        return $this;
    }
}


$res = (new PaymentStrategy('stripe'))->pay();






 */











/* LARAVEL EXAMPLE FILTERING
class OrderService
{
    private $selector;

    public function initSelector($fileds = ["*"])
    {
        $this->selector = Order::select($fileds);
        return $this;
    }

    public function setDueDate($date): self
    {
        $this->selector->where('due_date', $date);
        return $this;
    }

    public function setUserIdSelector($user_id): self
    {
        $this->selector->where('user_id', $user_id);
        return $this;
    }

    public function setState($state): self
    {
        $this->selector->where('state', $state);
        return $this;
    }

    public function getOrders()
    {
        return $this->selector->get();
    }
}

$service = new OrderService();
$service->initSelector();

if ($date = $request->input('date')) {
    $service->setDueDate($date);
}

if ($state = $request->input('state')) {
    $service->setState($state);
}

if ($uid = $request->input('user_id')) {
    $service->setUserIdSelector($uid);
}


$service->getOrders();


*/





/* strategy
interface Payable
{
    public function pay(): bool;
    public function setCredits(): self;
}

class PayPal implements Payable
{
    public function pay(): bool
    {
        return true;
    }

    public function setCredits(): Payable
    {
        return $this;
    }
}


class Stripe implements Payable
{

    public function pay(): bool
    {
        return true;
    }

    public function setCredits(): Payable
    {
        return $this;
    }
}

class LiqPay implements Payable
{

    public function pay(): bool
    {
        return true;
    }

    public function setCredits(): Payable
    {
        return $this;
    }
}

class PaymentFabric
{
    public static function getPaymentService(string $name): Payable
    {
        switch ($name) {
            case "stripe":
                return new Stripe();
            case "paypal":
                return new PayPal();
            case "liqpay":
                return new LiqPay();
        }
        return null;
    }
}


class PaymentService
{
    private $paymentService;

    public function __construct(Payable $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function pay()
    {
        $this->paymentService->setCredits()->pay();
    }
}


$method = $_GET['method'];
$payment = PaymentFabric::getPaymentService($method);
$service = new PaymentService($payment);
$service->pay();
*/




//BUILDER
/*
class User
{
    private $name;
    private $age;

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function save()
    {
        echo "SAVE";
    }
}

$user = new User();
$user->setName("Viktor");
$user->setAge(25);
$user->save();

$user
    ->setName("Viktor")
    ->setAge(25)
    ->save();
*/