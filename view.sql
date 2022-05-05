Drop view if exists emplyees;
drop view if exists Latest_orders;
drop view if exists fulfilled;

create view emplyees as 
select 
	Worker.Fname as First_Name,
	Worker.Lname as Last_Name
From Worker
Order by First_Name;


create view fulfilled as
select 
	Orders.orderid as Order_Number,
	Worker.SSN as Completed_By
from Orders natural join Worker
order by Order_Number;



create view Latest_orders as 

select
 	Customer.Fname,
	Customer.Lname,
	Orders.orderid,
	Orders.orderdate,
	Orders.shipdate, 
	Contains.productid,
	Contains.pname
from Customer natural join Orders natural join Contains
where Orders.customerid = Customer.ID;


