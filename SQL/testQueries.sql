SELECT * FROM flights, seats WHERE START_LOC ='MUC'and END_LOC ='DXB' and DEPART_TIME LIKE '2021-05-09 22:35:00' and flights.FLIGHT_ID = seats.FLIGHT_ID and '{$classAvail}' > 0