SELECT * FROM flights, seats WHERE START_LOC ='LHR'and END_LOC ='CMP' AND SEATS.FLIGHT_ID = FLIGHTS.FLIGHT_ID;