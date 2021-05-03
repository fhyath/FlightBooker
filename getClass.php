<?php
function getClass($classname){
    if($classname == "business"){
        return "seats.B_Availability";
    }else if($classname == "fc"){
        return "seats.FC_Availability";
    }else{
        return "seats.E_Availability";
    }
}