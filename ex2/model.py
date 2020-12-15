import mysql.connector


class DB:
    def __init__(self):
        self.mydb = mysql.connector.connect(
            host = 'localhost',
            user = 'root',
            password = '1234',
            database = 'test'
        )
        self.create_table()

    def create_table(self):
        cursor = self.mydb.cursor()
        query = ''' create table if not exists customer
        (
        customerid int primary key,
        firstname varchar(15),
        lastname varchar(15),
        companyname varchar(30),
        billingaddress1 varchar(50),
        billingaddress2 varchar(50),
        city varchar(20),
        state varchar(3),
        postalcode varchar(15),
        country varchar(20),
        phonenumber varchar(20),
        emailaddress varchar(40),
        createddate datetime
        )'''
        cursor.execute(query)

    def insert_data(self,data):
        query = ' insert into customer values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)'
        
        cursor = self.mydb.cursor()
        cursor.executemany(query,data)
        self.mydb.commit()

