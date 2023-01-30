create table ks_paymentTmp (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	passwd varchar(100),
	name varchar(50),
	gender char(1),
	phone varchar(100),
	zipcode varchar(5),
	addr01 varchar(100),
	addr02 varchar(100),
	email varchar(255),
	rCode varchar(50),
	payMode varchar(30),
	payTitle varchar(30),
	payAmt int(11),
	orderNum int(11),
	prodList text,
	usePoint int(11),
	userip varchar(30),
	rDate varchar(30),
	rTime int(11)
);

create table ks_payment (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	payMode varchar(50),
	payTitle varchar(50),
	payAmt int(11),
	paynum varchar(100),
	app_no varchar(100),
	orderNum int(11),
	bankname varchar(100),
	depositor varchar(100),
	account varchar(100),
	va_date varchar(100),
	cash_yn varchar(100),
	cash_authno varchar(100),
	use_pay_method varchar(100),
	device varchar(50),
	payOk varchar(30),
	vaDate varchar(50),
	vaTime int(11),
	userip varchar(50),
	rDate varchar(50),
	rTime int(11)
);

create table ks_itemCode01 (
	uid int(11) PRIMARY KEY auto_increment,
	cade01 varchar(100),
	sort int(11)
);

create table ks_itemCode02 (
	uid int(11) PRIMARY KEY auto_increment,
	cade01 varchar(100),
	cade02 varchar(100),
	sort int(11)
);

create table ks_itemCode03 (
	uid int(11) PRIMARY KEY auto_increment,
	cade01 varchar(100),
	cade02 varchar(100),
	cade03 varchar(100),
	sort int(11)
);

create table ks_product (
	uid int(11) PRIMARY KEY auto_increment,
	cade01 varchar(100),
	cade02 varchar(100),
	cade03 varchar(100),
	title varchar(100),
	price int(11),
	memo text,
	upfile01 varchar(100),
	realfile01 varchar(100),
	userip varchar(30),
	rDate varchar(30),
	rTime int(11)
);

create table ks_order (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	name varchar(50),
	status varchar(30),
	prodCnt int(11),
	prodAmt int(11),
	payAmt int(11),
	usePoint int(11),
	orderDate varchar(30),
	orderTime int(11),
	userip varchar(30),
	rDate varchar(30),
	rTime int(11)
);

create table ks_orderList (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	pid int(11),
	title varchar(100),
	price int(11),
	status varchar(30),
	paynum varchar(100);
	rTime int(11)
);






create table tb_popup (
	uid int(11) PRIMARY KEY auto_increment,
	ptype varchar(30),
	chk_width int(5),
	pop_width int(15),
	pop_height int(15),
	pop_page varchar(30),
	pop_location varchar(30),
	pop_left varchar(20),
	pop_top varchar(20),
	pos_mod varchar(15),
	scrolling varchar(10),
	title varchar(50),
	ment text,
	pop_day varchar(20),
	chk_enable int(15),
	reg_date int(11),
	sTime int(11),
	eTime int(11)
);



create table ks_shopConfig (
	uid int(11) PRIMARY KEY auto_increment,
	joinPoint int(11),
	reviewPoint int(11),
	pointDelDay int(3),
	DeliveryName01 varchar(50),
	DeliveryUrl01 text,
	DeliveryName02 varchar(50),
	DeliveryUrl02 text,
	DeliveryName03 varchar(50),
	DeliveryUrl03 text
);

insert into ks_shopConfig (joinPoint) values (0);




create table ks_pointList (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	ptype char(1),
	point int(11),
	afterPoint int(11),
	currentPoint int(11),
	pMent varchar(255),
	orderNum int(11),
	userip varchar(30),
	rDate varchar(30),
	rTime int(11)
);

create table ks_contact (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	company varchar(100),
	name varchar(50),
	phone varchar(30),
	email varchar(100),
	ment text,
	userip varchar(30),
	rDate varchar(30),
	rTime int(11)
);

create table ks_review (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	name varchar(50),
	pid int(11),
	orderNum int(11),
	score int(3),
	upfile01 varchar(50),
	realfile01 varchar(100),
	upfile02 varchar(50),
	realfile02 varchar(100),
	upfile03 varchar(50),
	realfile03 varchar(100),
	upfile04 varchar(50),
	realfile04 varchar(100),
	upfile05 varchar(50),
	realfile05 varchar(100),
	upfile06 varchar(50),
	realfile06 varchar(100),
	ment text,
	userip varchar(30),
	rDate varchar(30),
	rTime int(11)
);

create table ks_coupon (
	uid int(11) PRIMARY KEY auto_increment,
	userid varchar(100),
	title varchar(100),
	price int(11),
	eDate varchar(30),
	eTime int(11),
	orderNum int(11),
	uDate varchar(30),
	uTime int(11),
	userip varchar(30),
	rDate varchar(30),
	rTime int(11)
);