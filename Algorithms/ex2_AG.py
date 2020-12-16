y = 5
x = 3

count= 0
op = ['*2','-1']

def recur(x,o,count = 0):
    if x == y:
        return count
    if x <= 2*y:
        if o == '-1':
            x -= 1
            count +=1
            count = recur(x,'*2',count+1)
        elif  o == '*':
            x *= 2
            count +=1
            count =  recur(x,'-1',count+1)
    else:
        return None
    return count

print(recur(3,'-1',0))
print(recur(3,'*2',0))