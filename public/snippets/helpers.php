<?php

class Helper {
    // snippet here
    
    public function welcome($message) {
        return $message.'<br>';
    }

    public function microtimeFormat($microtime, $format = null, $decimal = 4) {
        // $start = microtime(true);
        // sleep(1);
        // var_dump($helper->microtimeFormat($start));

        $duration = microtime(true) - $microtime;
        $hours = (int)($duration/60/60);
        $minutes = (int)($duration/60)-$hours*60;
        $seconds = $duration-$hours*60*60-$minutes*60;

        if ($format == 'time') {
            return PHP_EOL.$hours.':'.sprintf('%02d', $minutes).':'.sprintf('%02d', $seconds);
        }
        return PHP_EOL.number_format((float)$seconds, $decimal, '.', '');
    }

    public function cartesian(array $input) {
        // $input = [
        //     'arm' => ['A', 'B', 'C'],
        //     'gender' => ['Female', 'Male'],
        //     'location' => ['Penang', 'KL'],
        // ];
        // var_dump($helper->cartesian($input));

        $result = [[]];
        foreach ($input as $key => $values) {
            $append = [];
            foreach ($values as $value) {
                foreach ($result as $data) {
                    $append[] = $data + [$key => $value];
                }
            }
            $result = $append;
        }

        return $result;
    }
}