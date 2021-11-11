//Top selling products

select * from products where ProID =
(select ProID 
  from 
    (select ProID , sum(OrderQuantity) as total_order,
        max(sum(OrderQuantity)) over() as maxSm   from orderdetails
        group by ProID
    )
where total_order = maxSm)