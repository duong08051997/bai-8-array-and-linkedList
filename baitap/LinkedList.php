<?php
include_once('Node.php');


class LinkedList
{
    private $firstNode;
    private $lastNode;
    private $count;

    public function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;

    }

    public function addFirst($element)
    {
        $node = new Node($element);
        $node->next = $this->firstNode;
        $this->firstNode = $node;
        if ($this->lastNode == NULL) {

            $this->lastNode = $node;
        }
        $this->count++;
    }

    public function addLast($element)
    {
        $node = new Node($element);
        $this->lastNode->next = $node;
        $node->next = NULL;
        $this->lastNode = $node;
        $this->count++;
    }

    public function add($index, $element)
    {
        if ($this->firstNode == NULL) {
            $this->addFirst($element);
        }
        $node = new Node($element);
        $prev = $this->firstNode;
        $current = $this->firstNode;
        for ($i = 0; $i < $index; $i++) {
            $prev = $current;
            $current = $current->next;
        }
        $prev->next = $node;
        $node->next = $current;
        $this->count++;
    }

    public function del($index)
    {
        $pre = $this->firstNode;
        $current = $this->firstNode;
        for ($i = 0; $i < $index; $i++) {
            $pre = $current;
            $current = $current->next;
        }
        $pre->next = $current->next;
        $this->count--;
    }

    public function delLast()
    {
        $pre = $this->firstNode;
        $current = $this->firstNode;
        while ($current->next != NULL) {
            $pre = $current;
            $current = $current->next;
        }
        $pre->next = NULL;
        $this->count--;

    }
    public function contains($obj)
    {
        $current =$this->firstNode;
        while ($current->next != NULL){
            if($current->element === $obj ){
                return true;
            }
            $current = $current->next;
        }
        return false;

    }
public function indexOf($obj)
{
    $arr = $this->display();
    $arrIndex = [];
    for ($i = 0; $i < $obj; $i++) {

        if ($arr[$i] == $obj) {

            array_push($arrIndex,$i);
        }
    }
    return $arrIndex;

}

    public function display()
    {
        $list = array();
        $current = $this->firstNode;
        while ($current != NULL) {
            array_push($list, $current->getNode());
            $current = $current->next;
        }
        return $list;
    }
}

$linkedList = new LinkedList();
$linkedList->addFirst(11);
$linkedList->addFirst(12);
$linkedList->addFirst(13);
$linkedList->addFirst(14);
$linkedList->addFirst(15);
$linkedList->addFirst(16);
$linkedList->addFirst(12);
//$linkedList->addLast(50);
$linkedList->add(2, 100);
$linkedList->delLast();
var_dump($linkedList->contains(10));
echo '<br>';
echo '<pre>';
var_dump($linkedList->indexOf(12));
echo '<pre>';
print_r($linkedList->display());

