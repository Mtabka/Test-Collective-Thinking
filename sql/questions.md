# SQL

![](images/sql-diagram.png)

## 1. Query

Based on the SQL diagram above, write the following queries:

**A.** Get authors with a last name beginning with "M" or who are born after 1950.

**Answer:**
```mysql
select * from author where YEAR(birth_date)>1950 and UPPER(last_name) like 'M%'
```


**B.** Count the number of books per category (empty categories too).

**Answer:**
```mysql
select c.name, count(b.id) as count from book b left join category c on c.id = b.category_id group by b.category_id
```


**C.** Find authors who wrote at least 2 books.

**Answer:**
```mysql
select a.* from author a join book b on b.author_id = a.id group by a.id having COUNT(b.id) > 2
```


**D.** Get 50 authors with at least one event between the start and the end of this year.

**Answer:**
```mysql
select a.* from author a join author_event ae on a.id = ae.author_id join event e on e.id = ae.event_id  where YEAR(e.date)= YEAR(CURDATE()) limit 50
```


**E.** Get the average number of books written by authors.

**Answer:**
```mysql
select avg(c) average from (select count(b.id) c from author a join book b on b.author_id = a.id group by a.id ) as tab
```


**F.** Get authors, sorted by the date of their **latest** event.

**Answer:**
```mysql
select a.* from author a join author_event ae on a.id = ae.author_id join event e on e.id = ae.event_id group by a.id order by e.date desc
```


## 2. Database Structure

**A.** Based on the SQL diagram above, what can be done to improve the performance of this query ?

```mysql
SELECT id, name FROM book WHERE YEAR(published_date) >= '1973';
```

**Answer:** ?
- create index on published_date
- number 1973 instead of the string '1973'

**B.** Give 3 common good practice on a database structure to optimize queries.

**Answer:** 
 - use views
 - create index on published_date
 - avoid select *
