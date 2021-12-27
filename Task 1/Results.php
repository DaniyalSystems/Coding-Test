<? php 


class scoreResult implements ScoreDataInterface {

public function __construct(){
        $csvFile=fopen("dataset.csv","r");
		while(! feof($csvFile)){
		$arr=fgetcsv(csvFile);
		$this->data = $arr;
    }
}

	public fuction getCountOfUsersWithinScoreRange(int $rangeStart,int $rangeEnd){
		 $result  = array_filter($this->data, function($arr) use($rangeStart, $rangeEnd) {
            return $arr['score'] >= $rangeStart && $arr['score'] <= $rangeEnd;
        });
        return count($result);
	}

	public fuction getCountOfUsersByCondition(string $region,string $gender,bool $hasLegalAge,bool $hasPositiveScore){
	 if(is_array($this->data))
        {
            $result = array_filter($this->data, function($arr) use($region,$gender,$hasLegalAge,$hasPositiveScore) {
                $regionVerify = false;
				$genderVerify = false; 
				$ageVerify = false;
				$scoreVerify = false;

                if(($hasLegalAge && $arr['age'] > 18) || (!$hasLegalAge && $arr['age'] < 18)){
                    $ageMatched = true;
				}
				
				if((!$hasLegalAge && $arr['age'] < 18)){
					$ageMatched = false;
				}

                if(($hasPositiveScore && $arr['score'] > 0)){
                    $scoreMatched = true;
				}
				
				if((!$hasPositiveScore && $arr['score'] < 1)){
					$scoreMatched = false;
				}

                if($v['region'] == $region && $arr['gender'] == $gender){
                    $regionMatched = true;
                    $genderMatched = true;
				}
				
                if($regionMatched && $genderMatched && $ageMatched && $scoreMatched){
                    return $arr;
				}
            });
            return count($result);
        }
        return false;	
	}

}

?>