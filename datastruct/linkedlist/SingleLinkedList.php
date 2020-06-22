<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/27
 * Time: 16:02
 */

namespace DataStruct\LinkedList;

// 单链表
class SingleLinkedList
{
    private $header;

    // 构造方法
    public function  __construct($data = Null)
    {
        $this->header = new Node($data);
    }

    // 添加节点数据
    public function addNode(Node $node)
    {
        $current = $this->header;
        while ($current->next != Null) {
            // 如果不是最后一个节点，则将下一个节点当做当前节点
            $current = $current->next;
        }
        $node->next = $current->next; // 将当前的下一个节点赋值给要添加的节点的下一个节点。
        $current->next = $node; // 将当前节点指向要添加的节点。
    }

    /**
     * @param $data
     * 遍历各个节点，比较数据，找到则删除
     */
    public function delNode($data)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != Null) {
            if ($current->next->data == $data) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $current->next = $current->next->next;
        } else {
            echo "not found this data: {5}\n";
        }
    }


    /**
     * 删除链表中指定的值 data，有可能有多个 data
     * @param $data
     */
    public function delNodeV2($data)
    {
        $header = $this->header;
        $current = $header->next;
        $preNode = $header;
        // 4 7 9 3 9 5
        while ($current->next != NULL) {
            if ($current->data == $data) {
                $preNode->next = $current->next;
            }
            $preNode = $current;
            // 不能直接使用 preNode = preNode->next
            // 如果删除了值，那么preNode = preNode->next 之后导致 current preNode 是一个节点
            $current = $current->next;
        }
    }


    // 清空链表
    public function clear()
    {
        $this->header = Null;
    }

    public function isEmpty()
    {
        $header = $this->header;
        if ($header == NULL || $header->next == NULL) {
            return true;
        }
        return false;
    }

    // 获取链表
    public function getLinkList()
    {
        $current = $this->header;
        var_dump($current);
        if ($current->next == Null) {
            echo("链表为空\n");
            return;
        }
        while ($current->next != Null) {
            echo $current->next->data . " ";
            if ($current->next->next == Null) {
                break;
            }
            $current = $current->next; // 当前节点的切换
        }
        echo "\n";
    }

    public function getLinkListV2()
    {
        $header = $this->header;
        if ($this->isEmpty()) {
            echo "this linkedlist is empty!\n";
            return;
        }
        echo "header->";
        $current = $header->next;
        while ($current != Null) {
            echo "{$current->data}->";
            if ($current->next == Null) {
                echo "Null\n";
                break;
            }
            $current = $current->next;
        }
    }

    /**
     * 打印节点的另一种方法
     */
    public function getLinkListNode()
    {
        $header = $this->header;
        if ($header == NULL || $header->next == NULL) {
            echo "linked list is empty!\n";
            return;
        }
        $current = $header->next;
        while ($current != NULL) {
            echo $current->data ." ";
            $current = $current->next;
        }
    }


    /**
     * 链表逆序
     * 从第二个节点开始  插入到头结点之后，需要把第一个节点指向 NULL 需要保存 next 节点用来循环
     */
    public function reverse()
    {
        $header = $this->header;
        if ($header->next == Null || $header == Null) {
            echo "linkedlist is empty or has one node!\n";
            return;
        }
        $next = NULL;
        // 第二个节点开始处理
        $current = $header->next->next;
        // 第一个节点指向 NULL
        $header->next->next = NULL;
        while ($current != Null) {
            // 确定当前的下一个节点  一个需要循环
            $next = $current->next;
            // 当前节点插入 heade 之后
            $current->next = $header->next;
            $header->next = $current;
            $current = $next;
        }
    }


    public function reverseV2()
    {
        $header = $this->header;
        if ($this->isEmpty()) {
            echo "this linkedlist is empty!\n";
            return;
        }
        $current = $header->next->next; // 从第二个节点开始处理
        $header->next->next = NULL; // 逆序之后第一个节点指向 NULL
        $next = Null;
        while ($current != NULL) {
            $next = $current->next; // 在进行下面操作时，先将当前的下一个节点保存一下，以免丢失正常遍历的顺序
            $current->next = $header->next; // 逆序操作: 当前节点指向 header 的下一个节点
            $header->next = $current; // header的下一个节点为 当前节点
            $current = $next; // 当前下一个节点赋值当前节点继续遍历
        }
    }


    /**
     * 移除链表中重复的数据
     */
    public function removeRepeatNode()
    {
        $header = $this->header;
        if ($header == NULL || $header->next == NULL) {
            echo "linked list is empty!";
            return;
        }

        $outerCur = $header->next;
        while ($outerCur->next != NULL) {
            $value = $outerCur->data;
            $innerCur = $outerCur->next;
            $innerPre = $outerCur;
            while ($innerCur != NULL) {
                if ($value == $innerCur->data) {
                    // 值相同 删除
                    $innerPre->next = $innerCur->next;
                }
                $innerPre = $innerCur;
                $innerCur = $innerCur->next;
            }
            $outerCur = $outerCur->next;
        }
    }


    /**
     * 获取倒数第k个节点数据
     * @param $k
     */
    public function getBackKeyNum($k)
    {
        $header = $this->header;
        if ($this->isEmpty()) {
            echo "this linked list is empty!\n";
            return;
        }

        $fast = $low = $header->next;
        while ($k > 0) {
            $fast = $fast->next;
            $k--;
        }

        while (true) {
            if ($fast->next == NULL) {
                echo $low->next->data . "\n";
                break;
            }
            $fast = $fast->next;
            $low = $low->next;
        }
    }


    /**
     * 合并两个有序链表
     * @param SingleLinkedList $linked1
     * @param SingleLinkedList $linked2
     */
    public function mergeLinked(SingleLinkedList $linked1, SingleLinkedList $linked2)
    {
        $header1 = $linked1->header;
        $header2 = $linked2->header;
        $linked3 = new self();
        $cur1 = $header1->next;
        $cur2 = $header2->next;
        while ($cur1 != NULL && $cur2 != NULL) {
            if ($cur1->data < $cur2->data) {
                $linked3->addNode($cur1);
                $cur1 = $cur1->next;
            } else {
                $linked3->addNode($cur2);
                $cur2 = $cur2->next;
            }
        }
        if ($cur1 != NULL) {
            $linked3->addNode($cur1);
        }
        if ($cur2 != NULL) {
            $linked3->addNode($cur2);
        }

        $headers = $linked3->header;
        $current = $headers->next;
        while ($current != NULL) {
            echo $current->data . " ";
        }
    }



}


