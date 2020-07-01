<?php
include_once ('Node.php');
class LinkList{
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
            $this->lastNode= $node;
        }
    }
    public function addLast($element)
    {
        if ($this->firstNode!=NULL) {
            $node = new Node($element);
            $this->lastNode->next = $node;
            $node->next = NULL;
            $this->lastNode = $node;
        }

    }

    public function add($index,$element)
    {
        if ($index == 0) {
            $this->addFirst($element);
        }else{
            $node = new Node($element);
            $pre = $this->firstNode;
            $current = $this->firstNode;
            for ($i = 0; $i < $index; $i++) {
                $pre = $current;
                $current = $current->next;
            }
            $pre->next = $node;
            $node->next = $current;
        }

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
    }
    public function delLast()
    {
        $pre = $this->firstNode;
        $current = $this->firstNode;
        while ($current->next !== NULL){
            $pre = $current;
            $current = $current->next;
        }
        $pre->next = NULL;

    }
    public function search($index)
    {
        $current = $this->firstNode;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        return $current->getNode();
    }

    public function contain($obj)
    {
        $current = $this->firstNode;
        while ($current !== NULL){
            if ($current->getNode()=== $obj) {

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
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i]=== $obj) {

                array_push($arrIndex,$i);
            }
        }
        return $arrIndex;
    }

    public function display()
    {
        $list =array();
        $current = $this->firstNode;
        while ($current != NULL){
            array_push($list,$current->getNode());
            $current = $current->next;
        }
        return $list;

    }

}
$linkedList = new LinkList();
$linkedList->addFirst(12);
$linkedList->addFirst(11);
$linkedList->addFirst(14);
$linkedList->addFirst(15);
$linkedList->addFirst(10);
$linkedList->addFirst(15);

//$linkedList->addLast(50);
//$linkedList->add(2,150);
//$linkedList->del(3);
//$linkedList->delLast();
echo $linkedList->search(2);
var_dump($linkedList->contain(11));
echo '<pre>';
print_r($linkedList->display());
var_dump($linkedList->indexOf(15));