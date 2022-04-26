Drop view if exists emplyees;
drop view if exists Cutomer_orders;
drop view if exists fulfilled;

create view emplyees as 
select 
	Worker.Fname as First_Name,
	Worker.Lname as Last_Name
From Worker
Order by Fname;


create view fulfilled
select 
	Orders.orderid as Order_Number
	Worker.SSN as Completed_By,
from Orders natural join Worker
order by Order_Number;



create view Lastest_orders as 

select 
	Customer.Fname,
	Customer.Lname,
	Customer.ID,
	Orders.orderid,
	Orders.orderdate,
	Orders.shipdate, 
	Contains.productid,
	Product.pname
from Customer natiral join Orders natural join Contains natural join Product
where Orders.customerid = Customer.ID;

