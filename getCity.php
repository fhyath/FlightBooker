<?php
function getCity($cityCode) {
    switch ($cityCode) {
        case "NYC":
            return "NEW YORK CITY";
        case "ATL":
           return "ATLANTA";
        case "LHR":
            return "LONDON";
        case "MUC":
            return "MUNICH";
        case "YYZ":
           return "TORONTO";
        case "IST":
            return "ISTANBUL";
        case "LAX":
            return "LOS ANGELES";
        case "CMP":
           return "SRI LANKA";
        case "DXB":
            return "DUBAI";
        case "CDG":
            return "PARIS";
    }
}