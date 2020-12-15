import requests 
import pandas as pd

res = requests.get('https://f676fa01656d764fa189d94135256f1d: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@wowowo12.myshopify.com/admin/api/2020-10/customers.json')

df = pd.DataFrame.from_records(res.json().get('customers'))

df.to_csv('my.csv')

for cus in res.json().get('customers'):
    print(cus)
