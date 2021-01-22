--
-- Database: `schooldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `admin_table` (
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`username`);
  
INSERT INTO `admin_table` (`username`, `password`) VALUES
('admin', 'admin');
