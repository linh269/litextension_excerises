from selenium import webdriver 

path = 'D:\install\selenium\chromedriver.exe'
drive = webdriver.Chrome(path)




drive.get('http://45.79.43.178/source_carts/wordpress/wp-admin')
email = drive.find_element_by_id('user_login')
email.send_keys('admin')
pw = drive.find_element_by_id('user_pass')
pw.send_keys('123456aA')

submit = drive.find_element_by_id('wp-submit')
submit.click()