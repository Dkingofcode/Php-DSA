<?php


class Pair {
    public $node;
    public $distance;
    public function __construct($distance, $node){
        $this->node = $node;
        $this->distance = $distance;
    }
   }
        
    class Solution {
        // Function to find sum of weights of edges of the Minimum Spanning Tree
        public function spanningTree($V, $adj){
            // Min-heap priority queue
            $pq = new SplPriorityQueue();
            $pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

            $vis = array_fill(0, $V, 0);
            // {distance, node}
            $pq->insert(new Pair(0, 0), 0);
            $sum = 0;
            while(!$pq->isEmpty()) {
                $pair = $pq->extract();
                $wt = $pair['data']->distance;
                $node = $pair['data']->node;

                if ($vis[$node] == 1) continue;
                // add it to the mst
                $vis[$node] = 1;
                $sum += $wt;

                foreach ($adj[$node] as $edge){
                    $adjNode = $edge[0];
                    $edW = $edge[1];
                    if($vis[$adjNode] == 0) {
                        $pq->insert(new Pair($edW, $adjNode), -$edW);
                    }
                }
            }
            return $sum;

        }
    }








// Driver code
$V = 5;
$adj = array_fill(0, $V, []);
$edges = [
    [0, 1, 2],
    [0, 2, 1],
    [1, 2, 1],
    [2, 3, 2],
    [3, 4, 1],
    [4, 2, 2]
];

foreach ($edges as $edge){
    $u = $edge[0];
    $v = $edge[1];
    $w = $edge[2];

    $adj[$u][] = [$v, $w];
    $adj[$v][] = [$u, $w];
}



$obj = new Solution();
$sum = $obj->spanningTree($V, $adj);
echo "The sum of all the edge weights: " . $sum . "\n";


?>