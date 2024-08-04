create database `grocery`;
use `grocery`;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `no_of_items` int(10) NOT NULL,
  `cost_of_item` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER $$
CREATE TRIGGER `delete` BEFORE DELETE ON `cart` FOR EACH ROW BEGIN
	insert into purchase(pcid,ppid,no_of_items,cost_of_items,date_time) VALUES(old.cid,old.pid,old.no_of_items,old.no_of_items*old.cost_of_item,now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert1` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
	update products set no_of_items=no_of_items-1 where ID=new.pid; 
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update1` AFTER UPDATE ON `cart` FOR EACH ROW BEGIN
	update products set no_of_items=no_of_items-1 where ID=old.pid;
end
$$
DELIMITER ;



CREATE TABLE `customer` (
  `ID` int(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `Time_of_join` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `customer` (`ID`, `user`, `password`, `phone_no`, `Time_of_join`) VALUES
(1, 'Test1', 'abc', 1234567890, '2023-03-28 11:39:37'),
(2, 'Test2', 'def', 9876543211, '2023-03-28 11:34:12'),
(3, 'Test3', 'ghi', 9876543212, '2023-03-28 11:56:59');



CREATE TABLE `employee` (
  `e_username` varchar(20) NOT NULL,
  `e_password` varchar(20) NOT NULL,
  `e_phone_no` bigint(10) NOT NULL,
  `e_date_join` datetime NOT NULL,
  `eid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `employee` (`e_username`, `e_password`, `e_phone_no`, `e_date_join`, `eid`) VALUES
('Saksham', 'Arora', 9999999999, '2023-05-11 12:58:52', 1),




CREATE TABLE `products` (
  `ID` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `Item_name` varchar(30) NOT NULL,
  `cost` int(10) NOT NULL,
  `no_of_items` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `products` (`ID`, `category`, `Item_name`, `cost`, `no_of_items`) VALUES
(1, 'Households', 'Air Freshener', 90, 1000),
(2, 'Kitchen', 'Sugar', 25, 1000),
(3, 'Groceries', 'Beverages', 10, 1000),
(4, 'Vegetables', 'Potato', 20, 1000),
(5, 'Fruits', 'Apple', 180, 1000),
(6, 'Dairy', 'Milk', 46, 1000),
(7, 'Staples', 'Pulses',80,1000),
(8, 'Snacks', 'Maggie' , 45, 1000),
(9, 'HomeCare' ,'Detergent', 90, 1000),
(10, 'PersonalCare' ,'BodyWash', 160 , 1000),
(11, 'BabyCare', 'Diaper', 100, 1000),
(12, 'Disposable','GarbageBags', 70,1000),
(13, 'Furnishing','Carpets',200,1000),
(14, 'HomeDecor','Artwork',500,1000),
(15, 'SpiritualNeeds', 'Agarbatti',60,1000),
(16, 'Electronics', 'Phone',25000,100),
(17, 'HomeApplicances','Fans',100,1000),
(18, 'Gaming', 'GamingConsole',100,1000),
(19, 'Beauty', 'Makeup',100,1000),
(20, 'Fitness', 'Vitamins and Supplements',100,1000);



CREATE TABLE `purchase` (
  `pcid` int(10) NOT NULL,
  `ppid` int(10) NOT NULL,
  `no_of_items` int(10) NOT NULL,
  `cost_of_items` int(10) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `purchase` (`pcid`, `ppid`, `no_of_items`, `cost_of_items`, `date_time`) VALUES
(1, 4, 1, 40, '2023-04-27 15:00:02'),
(1, 2, 1, 40, '2023-04-27 15:00:02'),
(1, 4, 3, 120, '2023-04-27 15:04:48'),
(1, 1, 1, 50, '2023-04-27 15:04:48'),
(1, 2, 1, 40, '2023-04-27 15:04:48'),
(1, 1, 2, 100, '2023-04-27 18:42:38'),
(1, 2, 1, 40, '2023-04-27 18:42:39'),
(2, 1, 1, 50, '2023-04-27 18:47:42'),
(2, 2, 1, 40, '2023-04-27 18:47:42'),
(2, 4, 2, 80, '2023-04-27 19:23:21'),
(1, 4, 7, 280, '2023-04-28 01:54:01'),
(1, 2, 2, 18, '2023-04-28 16:45:24'),
(1, 2, 2, 18, '2023-04-28 16:51:01');



ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_references_cart_customer` (`cid`),
  ADD KEY `pid` (`pid`) USING BTREE;


ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `user` (`user`);


ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `e_username` (`e_username`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Item_name` (`Item_name`);


ALTER TABLE `purchase`
  ADD KEY `fk_references_purchase_customer` (`pcid`),
  ADD KEY `fk_references_purchase_products` (`ppid`);


ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;


ALTER TABLE `customer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `employee`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `products`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



ALTER TABLE `cart`
  ADD CONSTRAINT `fk_references_cart_customer` FOREIGN KEY (`cid`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_references_cart_products` FOREIGN KEY (`pid`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_references_purchase_customer` FOREIGN KEY (`pcid`) REFERENCES `customer` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_references_purchase_products` FOREIGN KEY (`ppid`) REFERENCES `products` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;


