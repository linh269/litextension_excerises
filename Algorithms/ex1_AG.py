arr = ['1','-1']

opp = ['-','+']

'''
cho i chạy từ 2 đến 10
update toán tử và số phần từ theo j,số chữ số tăng : 1,12,123,1234... 
arr[j] += str(i) -> gắn lại gtri  cho các phần tử cũ
'''


for i in range (2,10):
    for j in range(len(arr)):
        for k in opp:
            arr.append(arr[j]+k+str(i))
        arr[j] += str(i)

for i in arr:
    if eval(i) ==100:
        print(i)