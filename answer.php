<?php namespace Track;

function main($lines) {
  $wordlist = str_split($lines[0]);
  $count = count($wordlist);
  for($i=1; $i<=$count; $i++){
    $list = combination($wordlist, $i);
    foreach($list as $v){
      $result_word[] = implode($v);
    }
  }

  $unique = $result_word;
  $unique = array_unique($result_word);
  echo count($unique);
}

$array = array();
while (true) {
  $stdin = fgets(STDIN);
  if ($stdin == "") {
    break;
  }
  $array[] = rtrim($stdin);
}
main($array);


function combination($arr, $r)
{
    $n = count($arr);
    $result = [];
    if($r === 1){
        foreach($arr as $item){
            $result[] = [$item];
        }
    }
    if($r > 1){
        for($i = 0; $i < $n-$r+1; $i++){
            $sliced = array_slice($arr, $i + 1);
            $recursion = combination($sliced, $r - 1);
            foreach($recursion as $one_set){
                array_unshift($one_set, $arr[$i]);
                $result[] = $one_set;
            }
        }
    }
    return $result;
}
