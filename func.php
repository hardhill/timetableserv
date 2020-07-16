<?php
function ServerOtvet(array $in)
{
    $s =json_encode($in,JSON_UNESCAPED_UNICODE);
    return $s;
}

function convert_from_cp1251_to_utf8_recursively($dat)
{
    if (is_string($dat))
        return iconv('CP1251','UTF-8',$dat);
    if (!is_array($dat))
        return $dat;
    $ret = array();
    foreach ($dat as $i => $d)
        $ret[$i] = convert_from_cp1251_to_utf8_recursively($d);
    return $ret;
}

//возвращает понедельник недели которой относится заданый день
function GetMondaybyDay($dd){
    $otvet = new DateTime($dd);
    $otvet = time_for_week_day('monday',strtotime($dd));
    return date("Y-m-d", $otvet);
}
//возвращает вскресенье недели которой относится заданый день
function GetSundaybyDay($dd){
    $otvet = new DateTime();
    $otvet = time_for_week_day('sunday',strtotime($dd));
    return date("Y-m-d", $otvet);
}

function GetStartMonthbyDay($dd){
    return date("Y-m-01", strtotime($dd));
}

function GetEndMonthbyDay($dd){
    return date("Y-m-t", strtotime($dd));
}

function GetDayTimeInterval($str_date){
    $intervals = array();
    //$ddate = new DateTime($str_date);
    $nday = date("j",strtotime($str_date));
    $nmonth = date("n",strtotime($str_date));
    $nyear = date("Y",strtotime($str_date));
    for($i=8;$i<22;$i++){
        $interval = array();
        $interval[] = date("Y-m-d H:i:s", mktime($i,0,0,$nmonth,$nday,$nyear));
        $interval[] = date("Y-m-d H:i:s", mktime($i+1,0,0,$nmonth,$nday,$nyear));
        $intervals[] = $interval;
    }
    return $intervals;
}

//возвращает дату по названию дня недели (неделя определяется датой как вторым параметром)
function time_for_week_day($day_name, $ref_time=null){
    $monday = strtotime(date('o-\WW',$ref_time));
    if(substr(strtoupper($day_name),0,3) === "MON")
        return $monday;
    else
        return strtotime("next $day_name",$monday);
}
?>
