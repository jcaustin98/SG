<?php
class yearMostAlive
{
    private function isValidYead($value){
        // do each validation for clarity
        if($value['end'] <= 1900 or $value['end'] >= 2000){
            return false;
            }
        if($value['birth'] <= 1900 or $value['birth'] >= 2000){
            return false;
        }
        if($value['birth'] > $value['end']){
            return false;
        }
    }
    public function getYearMostAlive($data){
        $age_counts = [];
        $age_counts = array_pad($age_counts, 100, 0);
        foreach ($data as $key => $value)
        {
            if($this->isValidYead($value) === false){
                return [];
            }
            $age_counts[$value['end'] - $value['birth'] + 1] += 1;
        }

        asort($age_counts, SORT_NUMERIC);
        $high_count = end($age_counts);
        $age = key($age_counts);
        return ['alive' => $high_count, 'year' => $age];
    }
}
