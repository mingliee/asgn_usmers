--
-- Database: `user-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `USR_ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `USR_NAME` varchar(255) NOT NULL,
  `USR_PSWD` varchar(200) NOT NULL,
  `USR_EMAIL` varchar(255) NOT NULL,
  `CREATE_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `USER`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT;