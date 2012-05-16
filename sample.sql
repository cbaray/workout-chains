-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2012 at 11:16 PM
-- Server version: 5.1.62
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moonw3_chains`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `person` varchar(32) NOT NULL,
  `time` bigint(20) NOT NULL,
  `description` varchar(128) NOT NULL,
  `url` varchar(256) NOT NULL,
  PRIMARY KEY (`person`,`time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`person`, `time`, `description`, `url`) VALUES
('ben', 1330761600, 'hiking', ''),
('ben', 1330675200, 'running', ''),
('ben', 1330588800, 'loading', ''),
('ben', 1330848000, 'jogging', ''),
('ben', 1330934400, 'intervals', ''),
('ben', 1331107200, 'testing', ''),
('ben', 1331193600, 'typing', ''),
('ben', 1331452800, 'gap', ''),
('ben', 1331535600, 'swimming', ''),
('ben', 1331622000, 'kettlebells', ''),
('ben', 1331708400, 'lying', ''),
('ben', 1331794800, 'p90x', ''),
('ben', 1331881200, 'diapers', ''),
('ben', 1331967600, 'jazz', ''),
('ben', 1332313200, 'update', ''),
('ben', 1332399600, 'updated!', ''),
('cris', 1333177200, 'tickle sal ALOT! plus some more!!!', ''),
('cris', 1333090800, 'tickle sal', ''),
('Catherine', 1333177200, 'got tickled', ''),
('ben', 1333177200, 'chased sadie', ''),
('Madeline', 1336201200, 'Running', ''),
('kari', 1333177200, 'Donuts', ''),
('kari', 1333090800, 'Donuts', ''),
('kari', 1333350000, 'packing', ''),
('cris', 1334214000, 'landscaping', ''),
('cris', 1334041200, 'one more', ''),
('kari', 1334041200, 'tickled sal', ''),
('cris', 1333868400, 'Coding', ''),
('ben', 1334214000, 'photo opp', ''),
('kari', 1333263600, 'Picking', ''),
('ben', 1334041200, 'photo opp', ''),
('ben', 1333263600, 'photo opp', ''),
('Catherine', 1334473200, '20 minutes kb swings', ''),
('cris', 1333522800, 'Nada thing', ''),
('madeline', 1334300400, 'photo opp', ''),
('madeline', 1334214000, 'photo opp', ''),
('madeline', 1334127600, 'photo opp!', ''),
('madeline', 1334041200, 'photo opp! 4', ''),
('madeline', 1333954800, 'photo opp! 5', ''),
('kari', 1331708400, 'packing', ''),
('Ben', 1334386800, 'Changed case', ''),
('Cris', 1334386800, '160 snatches 35#', ''),
('Cris', 1333350000, 'bingo', ''),
('Cris', 1333263600, 'bingo streak!', ''),
('Catherine', 1334386800, '160 snatches 26#', ''),
('Catherine', 1334300400, 'Fitbitting', ''),
('cris', 1334473200, '176 snatches 35# and soccer', 'http://barayweb.dyndns.org/~cbaray/images/workout1.jpg'),
('Ben', 1334473200, 'Running', 'http://25.media.tumblr.com/tumblr_m2jnsjrnX91ru16r8o1_1280.jpg'),
('Madeline', 1334473200, 'Running', ''),
('Kari', 1334473200, 'Carrying full boxes up and down the stairs', ''),
('Shawn', 1334473200, 'Moving', ''),
('Salvador', 1334473200, 'Yard work and soccer', ''),
('Catherine', 1334559600, 'Swings and snatches kb', ''),
('Cris', 1334559600, 'mace work', ''),
('Madeline', 1334559600, 'Running', ''),
('Kari', 1334559600, 'Running 20 min', ''),
('Ben', 1334559600, 'Run http://connect.garmin.com/activity/168959740', ''),
('Catherine', 1334646000, '20 min kb swings', ''),
('Salvador', 1334646000, 'Gardening', ''),
('Madeline', 1334646000, 'Running', ''),
('Ben', 1334646000, 'Run http://connect.garmin.com/activity/169247388', ''),
('Kari', 1334646000, 'Ab workout 15 min', ''),
('Cris', 1334646000, '150 swings 53#', ''),
('Salvador', 1334732400, 'Soccer', ''),
('Cris', 1334732400, 'Soccer practice', ''),
('Catherine', 1334732400, 'Kb swings ', ''),
('Madeline', 1334732400, 'Running', ''),
('Ben', 1334732400, 'Run + pumping iron http://connect.garmin.com/activity/169525021', ''),
('Kari', 1334732400, 'Running 20 min', ''),
('Ben', 1334818800, '25 mins Kettle bells!', ''),
('Madeline', 1334818800, 'Running', ''),
('Cris', 1334818800, 'Biking', ''),
('Salvador', 1334818800, 'Biking', ''),
('Catherine', 1334818800, 'Kb swings', ''),
('Kari', 1334818800, 'Ab workout 15min', ''),
('Cris', 1334905200, '120 swings 70#', ''),
('Salvador', 1334905200, 'Sky high, biking, wall ball', ''),
('Catherine', 1334905200, 'Sky high', ''),
('Madeline', 1334905200, 'Kettle bells', ''),
('Ben', 1334905200, 'Golf & kettle bells ', ''),
('Kari', 1334905200, 'Swimming', ''),
('Salvador', 1334991600, 'Biking, soccer', ''),
('Cris', 1334991600, '100 snatches 53#, yelling at soccer team in 90+ degree heat', ''),
('Kari', 1334991600, 'Back 15 min', ''),
('Ben', 1334991600, 'Run http://connect.garmin.com/activity/169525021', ''),
('Catherine', 1334991600, 'Kb swings', ''),
('Madeline', 1334991600, 'Running', ''),
('Cris', 1335078000, '100 mace swings and squats', ''),
('Catherine', 1335078000, 'Kb swings', ''),
('Salvador', 1335078000, 'Swimming', ''),
('Kari', 1335078000, 'Swimming', ''),
('Madeline', 1335078000, 'Running', ''),
('Ben', 1335078000, 'Stationary bike and weights', ''),
('Cris', 1335164400, 'Biking. Against the wind even. ', ''),
('Salvador', 1335164400, 'Jogging', ''),
('Catherine', 1335164400, 'Jogging', ''),
('Ben', 1335164400, 'Run http://connect.garmin.com/activity/171248430', ''),
('Madeline', 1335164400, 'Running', ''),
('Cris', 1335250800, '130 swings 70#', ''),
('Catherine', 1335250800, 'Short jog, swings', ''),
('Salvador', 1335250800, 'Wall ball, drop kicks (and chasing ball)', ''),
('Madeline', 1335250800, 'Running', ''),
('Kari', 1335250800, 'Cross train 30min', ''),
('Ben', 1335250800, 'Gym, pumped iron + bike + ellip''', ''),
('Catherine', 1335337200, 'Dance central Xbox kinect :)', ''),
('Salvador', 1335337200, 'Soccer', ''),
('Madeline', 1335337200, 'Elliptical', ''),
('Ben', 1335337200, 'Run, watch died', ''),
('Cris', 1335337200, '50 burpees 225#', ''),
('Kari', 1335337200, 'Legs', ''),
('Cris', 1335423600, '192 snatches 35#', ''),
('Madeline', 1335423600, 'Kettlebells', ''),
('Catherine', 1335423600, 'Kinect dance central :)', ''),
('Kari', 1335423600, 'Run', ''),
('Salvador', 1335423600, 'Wall ball, kinect', ''),
('Salvador', 1335510000, 'Hike', ''),
('Ben', 1335423600, 'Soccer', ''),
('Madeline', 1335510000, 'Kettlebells', ''),
('Catherine', 1335510000, 'Hike', ''),
('Cris', 1335510000, 'biking', 'http://app.strava.com/rides/7473397'),
('Ben', 1335510000, 'Kbells', ''),
('Catherine', 1335596400, 'Kb swings', ''),
('Salvador', 1335596400, 'Soccer', ''),
('Kari', 1335596400, 'Run', ''),
('Madeline', 1335596400, 'Running', ''),
('Ben', 1335596400, 'Gym, toning the guns ', ''),
('Cris', 1335596400, '140 swings 70#', ''),
('Cris', 1335682800, '120 mace swings and squats', ''),
('Catherine', 1335682800, 'Hike', ''),
('Salvador', 1335682800, 'Biking and playing w googoo', ''),
('Madeline', 1335682800, 'Kettlebells', ''),
('Ben', 1335682800, 'Run http://connect.garmin.com/dashboard?cid=15616892 and Vita Course 2000', ''),
('Cris', 1335769200, '120 snatches 53#', ''),
('Kari', 1335769200, 'Run', ''),
('Catherine', 1335769200, 'Kb swings', ''),
('Madeline', 1335769200, 'Kettle bells', ''),
('Ben', 1335769200, 'Gym, more guns and a spot of elliptical', ''),
('Salvador', 1335769200, 'Biking ', ''),
('Catherine', 1335855600, 'KB swings', ''),
('Madeline', 1335855600, 'Running', ''),
('Salvador', 1335855600, 'Biking', ''),
('Kari', 1335855600, 'Legs', ''),
('Cris', 1335942000, '3x3 basketball for an hour', ''),
('Kari', 1335942000, 'Cross train', ''),
('Salvador', 1335942000, 'Soccer', ''),
('Catherine', 1335942000, 'Jog', ''),
('Madeline', 1335942000, 'Running', ''),
('Madeline', 1336028400, 'Elliptical', ''),
('Kari', 1336028400, 'Abs', ''),
('Catherine', 1336114800, 'Kinect', ''),
('Salvador', 1336114800, 'Wall ball, biking, playing', ''),
('Kari', 1336114800, 'Back', ''),
('Madeline', 1336114800, 'Running', ''),
('Ben', 1336028400, 'Soccer', ''),
('Salvador', 1336201200, 'soccer', ''),
('Madeline', 1336287600, 'Kettlebells', ''),
('Salvador', 1336287600, 'Biking, landscaping', ''),
('Kari', 1336374000, 'Run', ''),
('Kari', 1336201200, 'Legs', ''),
('Madeline', 1336374000, 'Running', ''),
('Cris', 1336460400, '150 swings 70#', ''),
('Madeline', 1336460400, 'Running', ''),
('Catherine', 1336374000, 'Kb swimgs', ''),
('Catherine', 1336546800, 'Kb swings', ''),
('Cris', 1336546800, '1.75 hours of full court ball', ''),
('Salvador', 1336546800, 'Soccer', ''),
('Cris', 1336633200, 'bike to google & back', 'http://app.strava.com/rides/8249552'),
('Madeline', 1336633200, 'Kettle bells', ''),
('Madeline', 1336546800, 'Kettle bells', ''),
('Kari', 1336633200, 'Crosstrain', ''),
('Kari', 1336546800, 'Run', ''),
('Kari', 1336719600, 'Legs', ''),
('Cris', 1336719600, 'ntc - shaped back!', ''),
('Cris', 1336892400, '140 mace swings and squats', ''),
('Ben', 1336892400, 'Static bike & elliptical ', ''),
('Kari', 1336892400, 'Run', ''),
('Salvador', 1336806000, 'Soccer', ''),
('Cris', 1337065200, '120 snatches 53#', ''),
('Shawn', 1337065200, 'fitness challenge', 'http://slytrunk.com/fitness/shawn_2012-05-15.jpg'),
('Catherine', 1337065200, 'Kb swings', ''),
('EJ', 1337065200, 'Vigorous softball+15 min jog on treadmill', ''),
('Ben', 1337065200, 'Gym, bike, elliptical & weights', ''),
('Madeline', 1337065200, 'Running', ''),
('Kari', 1337065200, 'Run', '');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `person` varchar(32) NOT NULL,
  `period` int(11) NOT NULL,
  `chains` int(11) NOT NULL,
  `actions` int(11) NOT NULL,
  `longest` int(11) NOT NULL,
  `current` int(11) NOT NULL,
  PRIMARY KEY (`person`,`period`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`person`, `period`, `chains`, `actions`, `longest`, `current`) VALUES
('Catherine', 0, 2, 3, 2, 0),
('Ben', 0, 8, 21, 7, 0),
('Cris', 1, 4, 22, 16, 1),
('Ben', 1, 3, 18, 16, 1),
('Cris', 0, 6, 9, 4, 0),
('Kari', 0, 3, 6, 4, 0),
('Madeline', 0, 1, 5, 5, 0),
('Shawn', 0, 1, 0, 0, 0),
('Catherine', 1, 4, 21, 18, 0),
('Kari', 1, 7, 23, 8, 1),
('Madeline', 1, 1, 26, 26, 0),
('Shawn', 1, 1, 1, 1, 0),
('Salvador', 1, 5, 22, 16, 0),
('Thao', 1, 1, 0, 0, 0),
('EJ', 1, 1, 0, 0, 0),
('Cris', 2, 1, 1, 1, 1),
('Ben', 2, 1, 1, 1, 1),
('Catherine', 2, 1, 1, 1, 1),
('EJ', 2, 1, 1, 1, 1),
('Kari', 2, 1, 1, 1, 1),
('Madeline', 2, 1, 1, 1, 1),
('Salvador', 2, 1, 0, 0, 0),
('Shawn', 2, 1, 1, 1, 1),
('Thao', 2, 1, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
