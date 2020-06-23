<?php


namespace DataStruct\LinkedList;

class SingleLinkedListV2
{

    public $header;

//    /**
//     * 构造方法初始化第一个节点
//     * SingleLinkedListV2 constructor.
//     * @param string $data
//     */
//    public function __construct($data = "")
//    {
//        $this->header = new NodeV2();
//        $this->header->next = new NodeV2($data);
//    }

    /**
     * 构造方法不初始化第一个数据
     * SingleLinkedListV2 constructor.
     */
    public function __construct()
    {
        $this->header = new NodeV2();
    }

    public function isEmpty()
    {
        $header = $this->header;
        if ($header == NULL || $header->next == NULL) {
            return true;
        }
        return false;
    }


    public function addNode($data = "")
    {
        $node = new NodeV2($data);
        $header = $this->header;
        if ($this->isEmpty()) {
            $node->next = $header->next;
            $header->next = $node;
        } else {
            $current = $header->next;
            while ($current->next != NULL) {
                $current = $current->next;
            }
            $node->next = $current->next;
            $current->next = $node;
        }
    }

    public function getLinkedNode()
    {
        if ($this->isEmpty()) {
            echo "this linked list is empty!\n";
            return;
        }
        $header = $this->header;
        $current = $header->next;
        while ($current != NULL) {
            echo "{$current->data} ";
            $current = $current->next;
        }
        echo "\n";
    }

}