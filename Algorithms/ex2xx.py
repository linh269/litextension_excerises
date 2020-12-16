def count(x,y):
    count = 0
    while y > x:
        if y%2 ==1:
            y+=1
        y /=2
        count+=1
    print(x-y)
    return count +x-y

print(count(3,8))
