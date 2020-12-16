op = ['-1','*2']
x = 3
y = 14
arr = ['3']
re = []
f = False


# get list posible operators - both true and not true operators
for i,a in enumerate(arr):
    if eval(a+'*2')  <= 2*(y+1) :
        for o in op: 
            if o == '*2':
                arr.append('('+a+')'+o)

            else:
                arr.append(a +o)
    else:
        f = True
        break
for i in arr:
    print(i)
# add true result to new arr
for i in arr:
    if i:
        # print(i,':',eval(i))
        if eval(i) == y:
            re.append(i)
        elif eval(i) -1 == y:
            re.append(i+'-1')
 # count lowest operator
def count_op(arr):
    count = 0
    for i in arr:
        if i =='*' or i =='-':
            count +=1
    return count

# check liệu 2 số nhập vào có thể tính đc như v ko
if len(re) == 0:
    print('No result')
else:
    lowest = count_op(re[0])
    for i in re:
        print(i)
        if lowest < count_op(i):
            lowest = re 
    
    print(lowest)
