--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`id`, `location`, `start_date`, `end_date`, `max_participants`, `min_age`, `price`) VALUES
(1, 'Parc Desjardins', '2023-06-26', '2023-06-30', 24, 14, 295),
(2, 'Parc Desjardins', '2023-08-14', '2023-08-18', 12, 15, 295);

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`camp_id`, `user_id`) VALUES
(2, 1),
(1, 1),
(2, 2),
(1, 3),
(2, 3),
(1, 4),
(1, 5);


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `date_of_birth`) VALUES
(1, 'Jane', 'Doe', 'jane.doe@gmail.com', '1234', 'JaneDoe', '2008-04-17'),
(2, 'John', 'Doe', 'john.doe@gmail.com', '12034', 'JohnDoe', '2009-10-07'),
(3, 'Jenna', 'Gin', 'jenna.gin@gmail.com', '1368', 'JennaGin', '2010-01-11'),
(4, 'Justin', 'Tang', 'justin.tang@gmail.com', '09887', 'JustinTang', '2006-02-19'),
(5, 'Bea', 'Dunn', 'bea.dunn@gmail.com', '3578', 'BeaDunn', '2008-10-17'),
(6, 'Eli', 'Dunn', 'eli.dunn@gmail.com', '3333', 'EliDunn', '2005-03-27'),
(7, 'Vic', 'Dunn', 'vic.dunn@gmail.com', '02831', 'VicDunn', '2011-04-17');