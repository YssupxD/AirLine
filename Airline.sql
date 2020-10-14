-- 159.339 Assignment 2
--
-- Startup SQL source
--
-- First create a database and select it using USE
-- Then source this SQL file
--
-- Add additional tables as required and feel free to modify these
-- startup up tables as you see fit
-- 
-- List of aircraft types in the fleet. The assignment brief states 
-- there are 2 Cirrus jets and 2 Honda jets. Consider how this
-- can be accommodated in the database
CREATE DATABASE AirLine;
USE AirLine;

CREATE TABLE Aircraft ( 
    craftID     VARCHAR(3)   NOT NULL,
    model       VARCHAR(55)  NOT NULL,
    capacity    INT          NOT NULL,   -- max number of passengers
    rangenmi    FLOAT        NOT NULL,   -- range in nmi
    cruisekn    FLOAT        NOT NULL,   -- cruise speed in knots
    PRIMARY KEY (craftID)
);
INSERT INTO Aircraft VALUES ('A01', 'SyberJet SJ30i', 6, 622, 233);
INSERT INTO Aircraft VALUES ('A02',    'Cirrus SF50', 4, 1171, 342);
INSERT INTO Aircraft VALUES ('A03', 'HondaJet Elite', 5, 2205, 408);

-- List of destinations by airport
CREATE TABLE Destinations (
    code      VARCHAR(4)   NOT NULL,   -- 4 letter ICAO code
    tz        VARCHAR(8)   NOT NULL,
    airport   VARCHAR(55)  NOT NULL,   -- name of airport
    region    VARCHAR(55)  NOT NULL,   -- region served
    PRIMARY KEY (code)
);
INSERT INTO Destinations VALUES ('NZNE', '12:00:00', 'Dairy Flat Airport', 'North Shore');
INSERT INTO Destinations VALUES ('YSSY', '10:00:00', 'Sydney Kingsford Smith Airport', 'Sydney');
INSERT INTO Destinations VALUES ('NZRO', '12:00:00', 'Rotorua Aiport', 'Rotorua');
INSERT INTO Destinations VALUES ('NZCI', '12:45:00', 'Tuuta Aiport', 'Chatham Islands');
INSERT INTO Destinations VALUES ('NZGB', '12:00:00', 'Claris Aerodrome', 'Great Barrier Island');
INSERT INTO Destinations VALUES ('NZTL', '12:00:00', 'Lake Tekapo Airport', 'Mackenzie District');

-- List of operating routes. This information applies in either
-- direction between the points
CREATE TABLE Routes (
    routeID   VARCHAR(3)  NOT NULL,
    point1    VARCHAR(4)  NOT NULL,
    point2    VARCHAR(4)  NOT NULL,
    distance  FLOAT       NOT NULL,   -- separation distance in nmi
    craftID   VARCHAR(3)  NOT NULL,
    PRIMARY KEY(routeID),
    FOREIGN KEY(point1) REFERENCES Destinations(code),
    FOREIGN KEY(point2) REFERENCES Destinations(code),
    FOREIGN KEY(craftID) REFERENCES Aircraft(craftID)
);
INSERT INTO Routes VALUES ('R01', 'NZNE', 'YSSY', 1164, 'A01');
INSERT INTO Routes VALUES ('R02', 'NZNE', 'NZRO', 137, 'A02');
INSERT INTO Routes VALUES ('R03', 'NZNE', 'NZCI', 581, 'A02');
INSERT INTO Routes VALUES ('R04', 'NZNE', 'NZGB', 54), 'A03');
INSERT INTO Routes VALUES ('R05', 'NZNE', 'NZTL', 472, 'A03');

CREATE TABLE TimeTable (
    tID         int           NOT NULL   AUTO_INCREMENT,
    flightNum   VARCHAR(5)    NOT NULL,
    origin      VARCHAR(4)    NOT NULL,
    dest        VARCHAR(4)    NOT NULL,
    detDay      VARCHAR(3)    NOT NULL,
    depTime     VARCHAR(8)    NOT NULL,
    flightTime  VARCHAR(8)    NOT NULL,
    PRIMARY KEY(tID),
    FOREIGN KEY(origin) REFERENCES Destinations(code),
    FOREIGN KEY(dest) REFERENCES Destinations(code)
);
INSERT INTO TimeTable VALUES (1, 'IA001', 'NZNE', 'YSSY', 'Fri', '15:00:00', '03:45:00');
INSERT INTO TimeTable VALUES (2, 'IA002', 'YSSY', 'NZNE', 'Sun', '18:00:00', '03:45:00');
INSERT INTO TimeTable VALUES (3, 'IA003', 'NZNE', 'NZRO', 'Mon', '07:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (4, 'IA004', 'NZRO', 'NZNE', 'Mon', '12:00:00', '03:45:00');
INSERT INTO TimeTable VALUES (5, 'IA005', 'NZNE', 'NZRO', 'Mon', '16:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (6, 'IA006', 'NZRO', 'NZNE', 'Mon', '20:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (7, 'IA003', 'NZNE', 'NZRO', 'Tue', '07:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (8, 'IA004', 'NZRO', 'NZNE', 'Tue', '12:00:00', '03:45:00');
INSERT INTO TimeTable VALUES (9, 'IA005', 'NZNE', 'NZRO', 'Tue', '16:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (10, 'IA006', 'NZRO', 'NZNE', 'Tue', '20:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (11, 'IA003', 'NZNE', 'NZRO', 'Wed', '07:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (12, 'IA004', 'NZRO', 'NZNE', 'Wed', '12:00:00', '03:45:00');
INSERT INTO TimeTable VALUES (13, 'IA005', 'NZNE', 'NZRO', 'Wed', '16:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (14, 'IA006', 'NZRO', 'NZNE', 'Wed', '20:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (15, 'IA003', 'NZNE', 'NZRO', 'Thu', '07:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (16, 'IA004', 'NZRO', 'NZNE', 'Thu', '12:00:00', '03:45:00');
INSERT INTO TimeTable VALUES (17, 'IA005', 'NZNE', 'NZRO', 'Thu', '16:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (18, 'IA006', 'NZRO', 'NZNE', 'Thu', '20:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (19, 'IA003', 'NZNE', 'NZRO', 'Fri', '07:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (20, 'IA004', 'NZRO', 'NZNE', 'Fri', '12:00:00', '03:45:00');
INSERT INTO TimeTable VALUES (21, 'IA005', 'NZNE', 'NZRO', 'Fri', '16:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (22, 'IA006', 'NZRO', 'NZNE', 'Fri', '20:00:00', '00:45:00');
INSERT INTO TimeTable VALUES (23, 'IA007', 'NZNE', 'NZGB', 'Mon', '08:30:00', '00:40:00');
INSERT INTO TimeTable VALUES (24, 'IA007', 'NZNE', 'NZGB', 'Wed', '08:30:00', '00:40:00');
INSERT INTO TimeTable VALUES (25, 'IA007', 'NZNE', 'NZGB', 'Fri', '08:30:00', '00:40:00');
INSERT INTO TimeTable VALUES (26, 'IA008', 'NZGB', 'NZNE', 'Tue', '11:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (27, 'IA008', 'NZGB', 'NZNE', 'Fri', '11:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (28, 'IA008', 'NZGB', 'NZNE', 'Sat', '11:30:00', '00:45:00');
INSERT INTO TimeTable VALUES (29, 'IA009', 'NZNE', 'NZCI', 'Tue', '17:00:00', '02:15:00');
INSERT INTO TimeTable VALUES (30, 'IA009', 'NZNE', 'NZCI', 'Fri', '17:00:00', '02:15:00');
INSERT INTO TimeTable VALUES (31, 'IA010', 'NZCI', 'NZNE', 'Wed', '17:00:00', '02:30:00');
INSERT INTO TimeTable VALUES (32, 'IA010', 'NZCI', 'NZNE', 'Sat', '17:00:00', '02:30:00');
INSERT INTO TimeTable VALUES (33, 'IA011', 'NZNE', 'NZTL', 'Mon', '21:00:00', '01:45:00');
INSERT INTO TimeTable VALUES (34, 'IA012', 'NZTL', 'NZNE', 'Fri', '08:45:00', '01:45:00');

CREATE TABLE User (
    username    VARCHAR(16)     NOT NULL,
    password    VARCHAR(30)     NOT NULL,
    PRIMARY KEY(username)
);

INSERT INTO User VALUES ('test', 'test');

CREATE TABLE Booking(
    username    VARCHAR(16)    NOT NULL    UNIQUE,
    firstname   VARCHAR(16)    NOT NULL,
    origin      VARCHAR(4)     NOT NULL,
    dest        VARCHAR(4)     NOT NULL,
    passenger   INT            NOT NULL,
    PRIMARY KEY(username),
    FOREIGN KEY(origin) REFERENCES Destinations(code),
    FOREIGN KEY(dest) REFERENCES Destinations(code)
);



