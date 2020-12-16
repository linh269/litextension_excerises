arr = ['1','-1']

opp = ['-','+']

for i in range (2,10):
    for j in range(len(arr)):
        for k in opp:
            arr.append(arr[j]+k+str(i))
        arr[j] += str(i)

for i in arr:
    if eval(i) ==100:
        print(i)