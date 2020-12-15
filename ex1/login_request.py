import requests

url = 'http://45.79.43.178/source_carts/wordpress/wp-admin'

value = {
    'user_login':'admin',
    'user_pass':'123456aA'
}

re = requests.post(url,value)
print(re)