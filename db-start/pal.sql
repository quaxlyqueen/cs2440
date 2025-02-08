-------------------------- copy and paste to your local mysql server -------------------------------
drop database if exists palindromes;
create database palindromes;
use palindromes;
create table palindrome (id int auto_increment primary key, phrase varchar(255));
insert into palindrome (phrase) values ('race car'), ('bob'), ('senile felines'), ('stack cats');
select * from palindrome;
----------------------------------------------------------------------------------------------------


---------------------------- copy and paste to your remote server ----------------------------------
create table palindrome (id int auto_increment primary key, phrase varchar(255));
insert into palindrome (phrase) values ('race car'), ('bob'), ('senile felines'), ('stack cats');
select * from palindrome;
----------------------------------------------------------------------------------------------------
