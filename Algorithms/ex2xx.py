def count(x,y):
    count = 0
    while y > x:
        print(y)
        if y%2 ==1:
            y+=1
            count+=1
        y /=2
        count+=1
    # print(x)
    # print(y)
    return count +x-y

print(count(9,16))
