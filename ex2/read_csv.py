from model import DB
from datetime import datetime
import csv

mydb = DB()

arr = []

with open('customer.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:
        if line_count ==0:
            print('header')
        else:
            print(row[-1])
            row[-1] = datetime.strptime(row[-1],'%d/%m/%Y %H:%M')
            arr.append(row)
        line_count +=1
        print(f'Processed {line_count} lines.')
mydb.insert_data(arr[1:])
